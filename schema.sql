CREATE TABLE IF NOT EXISTS users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(80) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(10) NOT NULL
);


CREATE TABLE IF NOT EXISTS activities(
    activity_id INT AUTO_INCREMENT PRIMARY KEY,
    image longblob NOT NULL,
    acitvity_name VARCHAR(100) NOT NULL,
    acitvity_detail VARCHAR(255),
    activity_top VARCHAR(10)
);

CREATE TABLE IF NOT EXISTS booking(
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    activity_id INT NOT NULL,
    user_id INT NOT NULL,
    booking_date DATE NOT NULL,
    FOREIGN KEY(activity_id) REFERENCES activities(activity_id),
    FOREIGN KEY(user_id) REFERENCES users(user_id)
);

CREATE  TABLE IF NOT EXISTS admins(
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    admin_name VARCHAR(80) NOT NULL,
    admin_pass VARCHAR(255) NOT NULL
);