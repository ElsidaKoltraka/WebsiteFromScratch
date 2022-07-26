-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 11:04 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datatable1`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(200) NOT NULL,
  `text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `text`) VALUES
(1, ' <span  id=\"name2\">GYM7</span> was started in 2010 in Västerås and is today in addition to Västerås also in Eskilstuna and Stockholm. <br>\r\n                                Our goal is to give you as a member the most inspiring and best gym experience at a really good price. <br>\r\n                                All our gyms are open 24 hours a day and we offer equipment of the highest quality. <br>\r\n                                We hope that our cool gyms in a nice retro style will inspire you to exercise!');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(200) NOT NULL,
  `admin_name` varchar(2000) NOT NULL,
  `admin_password` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_password`) VALUES
(1, 'F', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

CREATE TABLE `bookingtable` (
  `id` int(200) NOT NULL,
  `username` varchar(300) NOT NULL,
  `trainername` varchar(300) NOT NULL,
  `groupname` varchar(300) NOT NULL,
  `bDay` varchar(300) NOT NULL,
  `bTime` varchar(200) NOT NULL,
  `bdate` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`id`, `username`, `trainername`, `groupname`, `bDay`, `bTime`, `bdate`) VALUES
(159, 'j', 'Noam Tamir', 'ZUMBA™', 'Wednesday', '16:10 ', '2021-11-10'),
(160, 'j', 'Elvin James', 'cycle', 'Tuesday', '17:10 ', '2021-11-09'),
(161, 'k', 'Elvin James', 'cycle', 'Tuesday', '17:10 ', '2021-11-09'),
(163, 'aa', 'Elvin James', 'cycle', 'Tuesday', '17:10 ', '2021-11-09'),
(164, 'aa', 'Noam Tamir', 'Fayad', 'Tuesday', '08:02 ', '2021-11-09'),
(165, 'fay', 'Noam Tamir', 'ZUMBA™', 'Wednesday', '16:10 ', '2021-11-10'),
(190, 'aa', 'Noam Tamir', 'Fayad', 'Tuesday', '08:02 ', '2021-12-28'),
(191, 'aa', 'Elvin James', 'cycle', 'Tuesday', '17:10 ', '2021-12-28'),
(192, 'aa', 'Elvin James', 'CORE', 'Friday', '14:00 ', '2021-12-31'),
(194, 'aa', 'Noam Tamir', 'ZUMBA™', 'Wednesday', '16:10 ', '2021-12-29'),
(195, 'aa', 'Alejandro Terrazas', 'YOGA', 'Monday', '11:30 ', '2021-12-27'),
(196, 'aa', 'Filip Andreev', 'Boxing', 'Monday', '15:00 ', '2021-12-27'),
(197, 'aa', 'Elvin James', 'cycle', 'Monday', '20:29 ', '2021-12-27'),
(198, 'aa', 'Elvin James', 'COMBAT™', 'Thursday', '09:15 ', '2021-12-30'),
(199, '22', 'Alejandro Terrazas', 'YOGA', 'Monday', '11:30 ', '2022-01-31'),
(200, '22', 'Filip Andreev', 'Boxing', 'Monday', '15:00 ', '2022-01-31'),
(201, '22', 'Elvin James', 'CORE', 'Friday', '14:00 ', '2022-02-04'),
(202, '88', 'Elvin James', 'CORE', 'Friday', '14:00 ', '2022-02-04'),
(203, '88', 'Filip Andreev', 'Boxing', 'Monday', '15:00 ', '2022-01-31'),
(204, '88', 'Noam Tamir', 'ZUMBA™', 'Wednesday', '16:10 ', '2022-02-02'),
(205, '88', 'Alejandro Terrazas', 'YOGA', 'Monday', '11:30 ', '2022-01-31'),
(206, '88', 'Elvin James', 'COMBAT™', 'Thursday', '09:15 ', '2022-02-03'),
(207, '22', 'Elvin James', 'COMBAT™', 'Thursday', '09:15 ', '2022-02-03'),
(208, '123', 'Elvin James', 'COMBAT™', 'Thursday', '09:15 ', '2022-02-03'),
(209, '123', 'Alejandro Terrazas', 'YOGA', 'Monday', '11:30 ', '2022-01-31'),
(210, '123', 'Noam Tamir', 'ZUMBA™', 'Wednesday', '16:10 ', '2022-02-02'),
(211, '123', 'Filip Andreev', 'Boxing', 'Monday', '15:00 ', '2022-01-31'),
(212, '123', 'Elvin James', 'CORE', 'Friday', '14:00 ', '2022-02-04'),
(213, '22', 'Alejandro Terrazas', 'YOGA', 'Monday', '11:30 ', '2022-02-21'),
(214, '22', 'Elvin James', 'CORE', 'Friday', '14:00 ', '2022-03-18'),
(215, '22', 'Noam Tamir', 'Club1', 'Saturday', '10:13 ', '2022-03-19'),
(216, 'sal', 'Noam Tamir', 'ZUMBA™', 'Wednesday', '16:10 ', '2022-03-30'),
(217, '22', 'Alejandro Terrazas', 'YOGA', 'Monday', '11:30 ', '2022-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `calculator`
--

CREATE TABLE `calculator` (
  `id` int(200) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calculator`
--

INSERT INTO `calculator` (`id`, `text`) VALUES
(1, 'HOW CAN YOU CALCULATE YOUR BMI'),
(2, '\r\nSimply put, the body mass index (BMI) is a measure that uses your height and weight to work out if you are a healthy size and calculate your BMI measurement.<br>\r\n                    Your BMI is found by dividing an adult’s weight in kilograms by their height in metres squared. The resulting number- usually between about 15-40 shows whether that person is underweight, a healthy weight, overweight or obese.<br>\r\n                    For those aged 2 to 18, the BMI calculation doesn’t just take into account their height and weight. Their age and gender are incorporated into the equation as well.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(200) NOT NULL,
  `title` varchar(300) NOT NULL,
  `text` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `title`, `text`) VALUES
(1, 'customer service', 'info@gym7.se'),
(2, 'facebook', 'GYM7 page'),
(3, 'instagram', '@gym7'),
(4, 'phone number', '010-8104170');

-- --------------------------------------------------------

--
-- Table structure for table `groupstable`
--

CREATE TABLE `groupstable` (
  `id` int(200) NOT NULL,
  `gName` varchar(300) NOT NULL,
  `gDuration` varchar(300) NOT NULL,
  `gDifficulty` varchar(300) NOT NULL,
  `gDay` varchar(300) NOT NULL,
  `gTime` varchar(300) NOT NULL,
  `gDescription` varchar(1000) NOT NULL,
  `gImage` varchar(2000) NOT NULL,
  `trainer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupstable`
--

INSERT INTO `groupstable` (`id`, `gName`, `gDuration`, `gDifficulty`, `gDay`, `gTime`, `gDescription`, `gImage`, `trainer`) VALUES
(4, 'YOGA', '60 minutes', 'Medium', 'Monday', '11:30 ', 'A physical yoga where you challenge your strength, mobility and balance. Provides increased body control, flexibility and better posture.', 'http://localhost/project1/images/Abs&Core-3.jpg', 'Alejandro Terrazas'),
(5, 'ZUMBA™', '30 minutes', 'Easy', 'Wednesday', '16:10 ', 'ZUMBA ™ is an energetic dance class with pulsating Latin American rhythms and music. The class consists of a warm-up, fitness part and deceleration.', 'http://localhost/project1/images/Abs&Core-5.jpg', 'Noam Tamir'),
(6, 'Boxing', '45 minutes', 'Easy', 'Monday', '15:00 ', 'Boxing session with both fitness and strength where we alternate stroke combinations and physiotherapy exercises. We often work in pairs.', 'http://localhost/project1/images/Boxing-2.jpg', 'Filip Andreev'),
(7, 'COMBAT™', '60 minutes', 'Medium', 'Thursday', '09:15 ', 'Energetic fitness session with movements inspired by various martial arts such as boxing, taekwondo, muay thai, karate', 'http://localhost/project1/images/Yoga-1.jpg', 'Elvin James'),
(8, 'CORE', '30 minutes', 'Hard', 'Friday', '14:00 ', 'This class includes both static and dynamic mobility exercises. You strengthen your core and improve mobility in both everyday life.', 'http://localhost/project1/images/Yoga-6.jpg', 'Elvin James'),
(20, 'Club1', '11 minutes', 'Easy', 'Saturday', '10:13 ', 'hello', 'Abs&Core-5.jpg', 'Noam Tamir');

-- --------------------------------------------------------

--
-- Table structure for table `gymmapheader`
--

CREATE TABLE `gymmapheader` (
  `name` int(200) NOT NULL,
  `text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gymmapheader`
--

INSERT INTO `gymmapheader` (`name`, `text`) VALUES
(1, 'HOW FIT ARE YOU, REALLY?'),
(2, 'HOW FIT ARE YOU, REALLY?\r\nPhysical fitness is key to a long life and good health. Your body’s capacity to transport and use oxygen during exercise (VO2 max) is the most precise measure of overall cardiovascular fitness. Based on the extensive research of The K. G. Jebsen Center of Exercise in Medicine at the Norwegian University of Science and Technology, you can easily estimate your fitness level by trying our calculator.');

-- --------------------------------------------------------

--
-- Table structure for table `gym_users`
--

CREATE TABLE `gym_users` (
  `id` int(200) NOT NULL,
  `username` varchar(2000) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `card1` varchar(100) NOT NULL,
  `city` varchar(200) NOT NULL,
  `date_joined` varchar(200) NOT NULL,
  `cvc` varchar(200) NOT NULL,
  `card` varchar(200) NOT NULL,
  `payment` varchar(300) NOT NULL,
  `ROLE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gym_users`
--

INSERT INTO `gym_users` (`id`, `username`, `password`, `userid`, `firstname`, `lastname`, `card1`, `city`, `date_joined`, `cvc`, `card`, `payment`, `ROLE`) VALUES
(2, 'aa', 'aa', 'aa', 'aa', 'aa', '', 'Vastras', '2021-10-29 04:49:18', '', '', '1 month', 'USER'),
(3, 'g', 'j', 'fgh', 'j', 'u', '', '', '2021-10-29 20:03:31', '', '', '', ''),
(4, 'hh', 'uu', 'yy', 'hh', 'hjk', '', '', '2021-10-29 20:04:54', '', '', '', ''),
(8, 'ad', 'ad', 'adm', '', '', '', '', '', '', '', '', 'ADMIN'),
(10, 'add', '58d1bbce297de3c304a9fefc3b483181872a5c6b', 'add', 'add', 'add', '', '', '2021-10-30 23:54:33', '', '', '', ''),
(11, 'jjj', 'jjj', 'jjj', 'jjj', 'jjj', '', '', '2021-10-31 16:31:42', '', '', '', ''),
(17, 'fh', 'fhh', 'Fayad', 'Fayad', 'Al Hanash', '', '', '2021-11-01 19:39:05', '', '', '', ''),
(18, 'fay', 'fay', 'fay', 'fay', 'fay', '', '', '2021-11-01 19:59:42', '', '', '', ''),
(19, 'w', 'w', 'w', 'w', 'w', '', '', '2021-11-22 01:21:15', '', '', '', ''),
(21, '11', '11', '11', '11', '11', '', '', '2022-01-25 14:14:28', '', '', '', ''),
(22, '22', '22', '22', '', '', '', '', '2022-01-25 18:02:44', '', '', '', ''),
(23, '88', '11', '88', '88', '88', '', '', '2022-01-26 08:13:14', '', '', '', ''),
(24, '123', '123', '123', '', '', '', '', '2022-01-26 09:37:32', '', '', '', ''),
(25, 'sal', 'sal', '11111', 'sal', 'sal', '', '', '2022-03-24 14:40:22', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `imageslider`
--

CREATE TABLE `imageslider` (
  `id` int(200) NOT NULL,
  `link` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imageslider`
--

INSERT INTO `imageslider` (`id`, `link`) VALUES
(1, 'images/FITNESS-LOGOS-2.jpg'),
(2, 'images/shutterstock_221678005-660x400.jpg'),
(3, 'images/Muscle-confusion-is-the-only-way-to-go.jpg'),
(4, 'images/marriottt-fitness-header-top.jpg'),
(9, 'http://localhost/Project/images/Abs&Core-1.jpg'),
(10, 'http://localhost/Project/images/Abs&Core-2.jpg'),
(11, 'http://localhost/Project1/images/Capture33'),
(12, 'http://localhost/Project1/images/Capture444.jpg'),
(13, 'http://localhost/Project1/images/Capture22.jpg'),
(14, 'http://localhost/Project1/images/Capture00.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `maincontent`
--

CREATE TABLE `maincontent` (
  `id` int(200) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maincontent`
--

INSERT INTO `maincontent` (`id`, `text`, `description`) VALUES
(18, 'New members will benefit from a 40% discount', 'Right now we offer all new members a 40% discount on all non-binding memberships! Take care, only valid until 30/11.'),
(19, 'ONE WEEK FREE TRAINING', 'Do you want to try training with us? Discover our gyms and group workouts for free for one week. You can train at over 230 gyms - whenever you want around the clock');

-- --------------------------------------------------------

--
-- Table structure for table `newsdata`
--

CREATE TABLE `newsdata` (
  `id` int(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `content` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supportdiv`
--

CREATE TABLE `supportdiv` (
  `name` int(200) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supportdiv`
--

INSERT INTO `supportdiv` (`name`, `text`) VALUES
(1, 'GOT A QUESTION? WE WOULD BE HAPPY TO HELP!'),
(2, 'support');

-- --------------------------------------------------------

--
-- Table structure for table `support_table`
--

CREATE TABLE `support_table` (
  `id` int(200) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `answers` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support_table`
--

INSERT INTO `support_table` (`id`, `question`, `answers`) VALUES
(1, 'Student Discount ?', 'To take advantage of the student discount, you need to present a valid student ID. <br>\r\n                                                        If you are an existing member without a lock-in period who has recently started studying, you need to extend your membership by 12 new months to take advantage of the student discount.\r\n                                                        If you are an existing member with an ongoing lock-in period, this must be waited out before you can transfer to a student award.'),
(2, 'Can I freeze / pause my membership ?', ' A freeze or break can be done at any of our gyms during working times. <br> \r\n                                                        It costs SEK 199 and the freezing can be for a maximum of 12 months.'),
(3, 'How do I pay for my monthly subscription?', 'A monthly paid membership is paid via direct debit (direct debit). The payments are made in advance and occur by the end of the month. <br>\r\n                                                    To set up a monthly subscription with direct debit you need a Swedish personal id number, Swedish id card and a valid Swedish bank account connected to it.'),
(4, 'How do I renew my membership and does it cost anything ?', 'Renewal of a subscription can be done at one of our gyms during openning times. <br>\r\n                                                        If you need a new membership card, it costs SEK 99 + the administrative fee of SEK 150. <br>'),
(5, 'I Lost membership card!', ' If you have lost or lost your membership card, you can buy a new one at one of our gyms during openning times. <br>\r\n                                                        A new card costs 99 SEK and is activated within 24 hours (usually within a few minutes).'),
(6, 'Can I pay for a whole year ? (Season ticket)', 'Absolutely! <br>\r\n                                                        Ordinary: SEK 3195.<br>\r\n                                                        Student / Pensioner: SEK 2,895. <br>\r\n                                                        Start-up fee of SEK 249 will be added when signing up for a new membership. <br>\r\n                                                        If you renew your membership, you pay an administrative fee of SEK 150 and if you need a new card when renewing, it costs SEK 99. <br>'),
(7, 'Opening Times', 'Our gyms are available around the clock for members.');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(200) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `certified1` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `firstname`, `lastname`, `description`, `image`, `certified1`, `title`) VALUES
(1, 'Alejandro', 'Terrazas', 'Coming to the United States from Bolivia when Alejandro was only 14 was a challenge, from learning a new culture, to language to overall lifestyle. His struggle with being bullied and always being told that he was incapable of anything made his life a true challenge. He motivates every single client to make their own shadow, and develop a new and stronger healthy lifestyle. He’s here to help you live longer.', 'images/download.jpg', 'APT, NASM-Group Fitness, RKC Kettlebell Level 1C', 'Coach'),
(2, 'Noam ', 'Tamir', 'Noam opened TS Fitness with the vision of creating a community-rich fitness environment that people really looked forward to coming to. His staff is not just made up of top-notch coaches but great people that make members feel connected and valued. Noam is inspired by getting people feeling better and accomplishing whatever goals they have. When he’s not at TS Fitness, you can find him enjoying live music and spending time with his family.', 'images/download1.jpg', 'NSCA- CSCS, SFG Level 1, TRX Group & Individual, FMS Level 1 & 2, Pre/Post Natal Certified', 'Coach'),
(3, 'Filip ', 'Andreev', 'After emigrating to America at the age of 3 with his parents from Bulgaria, Filip was raised in Queens. He always had a passion for sports and fitness, leading him to get a degree in Exercise Science/Sport & Exercise Psychology from Ithaca College.\r\nFilip is all about approaching a fitness goal with the most effective and proven methods using up-to-date scientific concepts and by tapping into the psychology behind mental barriers that we all face today.', 'images/download2.jpg', 'Degree- Exercise Science/Sports Psychology, Certifications: EXOS- XPS & XFS, TRX Group, FRC Mobility Specialist, FMS Level 1', 'Coach'),
(4, 'Chelsey', 'Yearian', 'Chelsey has worked at a variety of studios in New York and across the country. As a Certified Personal Trainer and Nutrition Coach, Chelsey is less about striving for diet perfection and more about encouraging you to eat the occasional donut with your kale salad. She’s a fan of short bios, chocolate chip cookies, coffee, and Phoebe Buffay.', 'images/download3.jpg', 'Certified Personal Trainer, Certified Nutrition Coach, FMS Certified Level 1 &2, C.H.E.K Institute Program Design & Scientific Core Conditioning, Behavioral Change Specialist', 'Yoga Coach'),
(5, 'Elvin', 'James', 'Being a coach allows Elvin to partake in two of his favorite aspects of life: being able to be helpful by assisting clients in reaching their fitness goals and meeting both clients and trainers from all walks of life. Elvin lives by three “F’s”: family, food, and fitness. And finally fitness– being consistent with your exercise regimen gets results, When he isn’t coaching, you can find Elvin shooting hoops, playing baseball, and spending time with his dog.', 'images/download4.jpg', 'NASM- CPT', 'Boxing Coach');

-- --------------------------------------------------------

--
-- Table structure for table `trainingcontent`
--

CREATE TABLE `trainingcontent` (
  `name` int(200) NOT NULL,
  `headline` varchar(300) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `text` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainingcontent`
--

INSERT INTO `trainingcontent` (`name`, `headline`, `image`, `text`) VALUES
(1, 'ATHLETIC YOGA', 'images/245496903_156974633311759_3032048132861051610_n.png', 'A physical yoga where you challenge your strength, mobility and balance. Provides increased body control, flexibility and better posture.'),
(2, 'ZUMBA™', 'images/istockphoto-535496960-612x612.jpg', 'ZUMBA ™ is an energetic dance class with pulsating Latin American rhythms and music. The class consists of a warm-up, fitness part and deceleration.'),
(3, 'Boxing', 'images/102661360-handsome-young-trainer-holding-punching-bag-while-female-boxer-training.jpg', 'Boxing session with both fitness and strength where we alternate stroke combinations and physiotherapy exercises. We often work in pairs.'),
(4, 'BODYCOMBAT™ ', 'images/bcc46063-11ed-426c-97ec-d29af7ae33b1-754x394.jpg', 'Energetic fitness session with movements inspired by various martial arts such as boxing, taekwondo, muay thai, karate'),
(5, 'CORE MOBILITY', 'images/BarBend-Feature-Image-1200-x-675-2020-11-27T123736.086.jpg', 'This class includes both static and dynamic mobility exercises. You strengthen your core and improve mobility in both everyday life and training. Everyone can participate, the instructor provides alternatives that allow the exercises to be adapted to both beginners and experienced.');

-- --------------------------------------------------------

--
-- Table structure for table `trainingcontentheader`
--

CREATE TABLE `trainingcontentheader` (
  `name` int(200) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainingcontentheader`
--

INSERT INTO `trainingcontentheader` (`name`, `text`) VALUES
(1, 'ENERGY IS FOR EVERY ONE'),
(2, 'Believe in the power of a motivating group fitness community.'),
(3, 'CHECK OUT OUR GROUP FITNESS CLASSES');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(1, 'F', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` int(200) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `user_name`, `password`) VALUES
(1, 'F', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `videocontainer`
--

CREATE TABLE `videocontainer` (
  `id` int(200) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videocontainer`
--

INSERT INTO `videocontainer` (`id`, `link`) VALUES
(1, 'https://player.vimeo.com/external/534875819.hd.mp4?s=662855d9634986490d9abe81753e1ac4d37c0687&profile_id=175'),
(4, 'https://www.youtube.com/watch?v=zQm6wQN-IN8'),
(5, 'https://player.vimeo.com/external/459420659.hd.mp4?s=4d97080258329a081a5bc03e5d6ae4ff3c579592&profile_id=175');

-- --------------------------------------------------------

--
-- Table structure for table `videocontent`
--

CREATE TABLE `videocontent` (
  `id` int(200) NOT NULL,
  `text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videocontent`
--

INSERT INTO `videocontent` (`id`, `text`) VALUES
(1, 'book a class'),
(2, 'DISCOVER CLASSES'),
(3, 'There\'s 5 awesome styles of classes you can try out including: Strength, Cardio, Fight, Cycle and Mind & Body. Designed with your training in mind incorporating the latest fitness trends so you can have fun whilst working out with like-minded members');

-- --------------------------------------------------------

--
-- Table structure for table `welcome_text`
--

CREATE TABLE `welcome_text` (
  `id` int(200) NOT NULL,
  `title` varchar(300) NOT NULL,
  `text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `welcome_text`
--

INSERT INTO `welcome_text` (`id`, `title`, `text`) VALUES
(1, 'welcome text', ' Welcome to <span id=\"name\">GYM7</span>  customer and support page! <br> \r\n                            Here you can get answers to the most common questions.<br> \r\n                            Feel free to search for what you are wondering about.<br> \r\n                            Thanks!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calculator`
--
ALTER TABLE `calculator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupstable`
--
ALTER TABLE `groupstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gymmapheader`
--
ALTER TABLE `gymmapheader`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `gym_users`
--
ALTER TABLE `gym_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imageslider`
--
ALTER TABLE `imageslider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maincontent`
--
ALTER TABLE `maincontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsdata`
--
ALTER TABLE `newsdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supportdiv`
--
ALTER TABLE `supportdiv`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `support_table`
--
ALTER TABLE `support_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainingcontent`
--
ALTER TABLE `trainingcontent`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `trainingcontentheader`
--
ALTER TABLE `trainingcontentheader`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videocontainer`
--
ALTER TABLE `videocontainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videocontent`
--
ALTER TABLE `videocontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welcome_text`
--
ALTER TABLE `welcome_text`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `calculator`
--
ALTER TABLE `calculator`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groupstable`
--
ALTER TABLE `groupstable`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gymmapheader`
--
ALTER TABLE `gymmapheader`
  MODIFY `name` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gym_users`
--
ALTER TABLE `gym_users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `imageslider`
--
ALTER TABLE `imageslider`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `maincontent`
--
ALTER TABLE `maincontent`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `newsdata`
--
ALTER TABLE `newsdata`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supportdiv`
--
ALTER TABLE `supportdiv`
  MODIFY `name` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `support_table`
--
ALTER TABLE `support_table`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trainingcontent`
--
ALTER TABLE `trainingcontent`
  MODIFY `name` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainingcontentheader`
--
ALTER TABLE `trainingcontentheader`
  MODIFY `name` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videocontainer`
--
ALTER TABLE `videocontainer`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videocontent`
--
ALTER TABLE `videocontent`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `welcome_text`
--
ALTER TABLE `welcome_text`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
