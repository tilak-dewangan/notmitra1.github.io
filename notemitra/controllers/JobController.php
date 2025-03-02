<?php

class JobController {
    
    protected $jobModel;

    public function __construct() {
        // JobModel का एक उदाहरण बनाना
        $this->jobModel = new JobModel();
    }

    // जॉब लिस्टिंग दिखाने के लिए
    public function index() {
        $jobs = $this->jobModel->getAllJobs();
        require_once 'views/job/index.php';
    }

    // जॉब पोस्ट करने के लिए
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'company' => $_POST['company'],
                'location' => $_POST['location'],
                'salary' => $_POST['salary']
            ];

            if ($this->jobModel->createJob($data)) {
                header('Location: /jobs');
            } else {
                // एरर हैंडलिंग
                echo "जॉब पोस्ट करने में समस्या आई।";
            }
        }

        require_once 'views/job/create.php';
    }

    // जॉब विवरण दिखाने के लिए
    public function show($id) {
        $job = $this->jobModel->getJobById($id);
        require_once 'views/job/show.php';
    }

    // जॉब अपडेट करने के लिए
    public function edit($id) {
        $job = $this->jobModel->getJobById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'company' => $_POST['company'],
                'location' => $_POST['location'],
                'salary' => $_POST['salary']
            ];

            if ($this->jobModel->updateJob($data)) {
                header('Location: /jobs/' . $id);
            } else {
                // एरर हैंडलिंग
                echo "जॉब अपडेट करने में समस्या आई।";
            }
        }

        require_once 'views/job/edit.php';
    }

    // जॉब हटाने के लिए
    public function delete($id) {
        if ($this->jobModel->deleteJob($id)) {
            header('Location: /jobs');
        } else {
            // एरर हैंडलिंग
            echo "जॉब हटाने में समस्या आई।";
        }
    }
}