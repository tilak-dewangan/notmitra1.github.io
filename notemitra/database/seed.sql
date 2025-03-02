INSERT INTO users (id, username, password, email, created_at) VALUES
(1, 'student1', 'hashed_password1', 'student1@example.com', NOW()),
(2, 'teacher1', 'hashed_password2', 'teacher1@example.com', NOW()),
(3, 'admin', 'hashed_password3', 'admin@example.com', NOW());

INSERT INTO notes (id, user_id, title, content, file_path, created_at) VALUES
(1, 1, 'Math Notes', 'Notes on Algebra and Geometry', 'uploads/notes/math_notes.pdf', NOW()),
(2, 1, 'Science Notes', 'Notes on Physics and Chemistry', 'uploads/notes/science_notes.pdf', NOW());

INSERT INTO videos (id, user_id, title, description, file_path, created_at) VALUES
(1, 1, 'Introduction to Algebra', 'A short video on Algebra basics', 'uploads/reels/algebra_intro.mp4', NOW()),
(2, 2, 'Physics Basics', 'An overview of basic Physics concepts', 'uploads/reels/physics_basics.mp4', NOW());

INSERT INTO jobs (id, user_id, title, description, company, created_at) VALUES
(1, 2, 'Internship at XYZ Corp', 'Looking for a summer intern in the IT department', 'XYZ Corp', NOW()),
(2, 1, 'Part-time Tutor', 'Seeking a tutor for Mathematics', 'ABC Tutoring', NOW());