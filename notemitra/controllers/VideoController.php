<?php

class VideoController {
    
    private $videoModel;

    public function __construct() {
        // VideoModel का एक उदाहरण बनाना
        $this->videoModel = new VideoModel();
    }

    // शॉर्ट स्टडी वीडियो की लिस्ट दिखाने के लिए
    public function index() {
        $videos = $this->videoModel->getAllVideos();
        // वीडियो व्यू को लोड करना
        require_once '../views/video/index.php';
    }

    // वीडियो अपलोड करने के लिए
    public function upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // वीडियो फाइल को प्रोसेस करना
            $videoFile = $_FILES['video'];
            $title = $_POST['title'];
            $description = $_POST['description'];

            // वीडियो को मॉडल में सेव करना
            $this->videoModel->uploadVideo($videoFile, $title, $description);
            // सफलता संदेश के साथ रीडायरेक्ट करना
            header('Location: /videos');
        } else {
            // अपलोड व्यू को लोड करना
            require_once '../views/video/upload.php';
        }
    }

    // वीडियो विवरण दिखाने के लिए
    public function show($id) {
        $video = $this->videoModel->getVideoById($id);
        // वीडियो विवरण व्यू को लोड करना
        require_once '../views/video/show.php';
    }

    // वीडियो को डिलीट करने के लिए
    public function delete($id) {
        $this->videoModel->deleteVideo($id);
        // सफलता संदेश के साथ रीडायरेक्ट करना
        header('Location: /videos');
    }
}