document.addEventListener('DOMContentLoaded', () => {

    window.URL = "./model/";
    window.model;
    window.webcam;
    window.publicP;
    window.ctx;
    window.labelContainer;
    window.maxPredictions;
    window.init = async function() {
        //ruta del archivo
        let modelURL = URL + "model.json";
        let metadataURL = URL + "metadata.json";

        // load the window.model and metadata
        // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
        // Note: the pose library adds a tmPose object to your window (window.tmPose)
        window.model = await tmPose.load(modelURL, metadataURL);
        window.maxPredictions = window.model.getTotalClasses();

        // Convenience function to setup a window.webcam
        let size = 600;
        let flip = true; // whether to flip the window.webcam
        window.webcam = new tmPose.Webcam(size, size, flip); // width, height, flip
        await window.webcam.setup(); // request access to the window.webcam
        await window.webcam.play();
        window.requestAnimationFrame(loop);

        // append/get elements to the DOM
        var canvas = document.getElementById("webcam-container");
        canvas.width = size;
        canvas.height = size;
        window.ctx = canvas.getContext('2d')
        window.labelContainer = document.getElementById("label-container");
        for (let i = 0; i < window.maxPredictions; i++) { // and class labels
            window.labelContainer.appendChild(document.createElement("div"));
        }

    }

    window.loop = async function(timestamp) {
        window.webcam.update(); // update the window.webcam frame
        await predict();
        let major = Array.from(window.publicP).sort((a, b) => { a.probability < b.probability });
        window.requestAnimationFrame(loop);
    }

    window.predict = async function() {
        // Prediction #1: run input through posenet
        // estimatePose can take in an image, video or canvas html element
        const { pose, posenetOutput } = await window.model.estimatePose(window.webcam.canvas);
        // Prediction 2: run input through teachable machine classification model
        const prediction = await window.model.predict(posenetOutput);
        window.publicP = prediction;

        for (let i = 0; i < window.maxPredictions; i++) {
            const classPrediction = prediction[i].className + ": " + prediction[i].probability.toFixed(2);
            window.labelContainer.childNodes[i].innerHTML = classPrediction;
            if (prediction[2].probability.toFixed(2) > 0.80) {
                document.getElementById('cam-1').style.backgroundColor = "#FFFF00";
            } else if (prediction[7].probability.toFixed(2) > 0.80) {
                document.getElementById('cam-1').style.backgroundColor = "#00FF00";
            } else if (prediction[6].probability.toFixed(2) > 0.80) {
                document.getElementById('cam-1').style.backgroundColor = "#FF0000";
            }
        }
        // finally draw the poses
        drawPose(pose);
    }

    window.drawPose = function(pose) {
        if (window.webcam.canvas) {
            ctx.drawImage(window.webcam.canvas, 0, 0);
            // draw the keypoints and skeleton
            if (pose) {
                const minPartConfidence = 0.5;
                window.tmPose.drawKeypoints(pose.keypoints, minPartConfidence, ctx);
                window.tmPose.drawSkeleton(pose.keypoints, minPartConfidence, ctx);
            }
        }
    }

});