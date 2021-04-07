create database sAttendance;
use sAttendance;

create table students(
    studentID int not null primary key auto_increment,
    fname varchar(255) not null,
    lname varchar(255) not null,
    email varchar(50) not null, 
    password varchar(255) not null
);

create table lecturers(
    lecturerID int not null primary key auto_increment,
    fname varchar(255) not null,
    lname varchar(255) not null,
    email varchar(50) not null, 
    password varchar(255) not null
);

create table registry(
    registryID int not null primary key auto_increment,
    fname varchar(255) not null,
    lname varchar(255) not null,
    email varchar(50) not null, 
    password varchar(255) not null
);

create table courses(
    courseID int not null primary key auto_increment,
    cName varchar(255) not null,
    cCode varchar(255) not null
);

create table classCourse(
    cCourseID int not null primary key auto_increment,
    courseID int not null,
    cDay varchar(255) not null,
    cStartTime time not null,
    cEndTime time not null,
    foreign key (courseID) references courses(courseID)
);

create table stud_chistory(
    stud_chistoryID int not null primary key auto_increment,
    studentID int not null,
    courseID int not null,
    classDate date not null,
    sTime time not null,
    attendStatus varchar(7) not null,
    foreign key (studentID) references students(studentID),
    foreign key (courseID) references courses(courseID)
);

create table attendCheck(
    attendCheckID int not null primary key auto_increment,
    studentID int not null,
    courseID int not null,
    cTime time not null,
    attendStatus varchar(7) not null,
    foreign key (studentID) references students(studentID),
    foreign key (courseID) references courses(courseID)
);

create table lect_chistory(
    lect_chistoryID int not null primary key auto_increment,
    lecturerID int not null,
    courseID int not null,
    classDate date not null,
    sTime time not null,
    foreign key (lecturerID) references lecturers(lecturerID),
    foreign key (courseID) references courses(courseID)
);

create table lect_course(
    lect_courseID int not null primary key auto_increment,
    lecturerID int not null,
    courseID int not null,
    foreign key (lecturerID) references lecturers(lecturerID),
    foreign key (courseID) references courses(courseID)
);

create table stud_course(
    stud_courseID int not null primary key auto_increment,
    studentID int not null,
    courseID int not null,
    foreign key (studentID) references students(studentID),
    foreign key (courseID) references courses(courseID)
);

create table reg_course(
    reg_courseID int not null primary key auto_increment,
    registryID int not null,
    courseID int not null,
    foreign key (registryID) references registry(registryID),
    foreign key (courseID) references courses(courseID)
);

create table class_timer(
    ctimerID int not null primary key auto_increment,
    lecturerID int not null,
    courseID int not null,
    duration float(2,1) not null,
    checknum int not null,
    foreign key (lecturerID) references lecturers(lecturerID),
    foreign key (courseID) references courses(courseID)
);

