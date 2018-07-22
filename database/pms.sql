-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 05:02 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `title`) VALUES
(1, 'mrsadetunji', 'lecturer', ' Adetunji', 'Dr'),
(2, 'psalmsam', 'kometh', 'Odunlade', 'Mr');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(3, 'General', 'These are projects that do not fall under any categories listed or known'),
(4, 'Web Based', 'These are projects that are hosted on world wide web or that made use of web technologies in their design'),
(5, 'Data Mining', 'These are projects that are based on data mining'),
(6, 'Artificial Inteligence', 'These are projects that are based on artificial inteligence'),
(7, 'Engineering', 'This category deals with engineering part of computer science. Both hardware and software are included');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `matric` varchar(100) NOT NULL,
  `session` int(4) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `abstract` longtext NOT NULL,
  `file` varchar(200) NOT NULL,
  `grade` varchar(200) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `matric`, `session`, `cat_id`, `title`, `abstract`, `file`, `grade`, `accepted`, `user_id`, `time_added`) VALUES
(2, 'odunlade Gbenga', 'csc120305', 2017, 7, 'evolution of computer', 'Agents are usually defined as entities that function continuously and autonomously in specific environments. Mobile Agents should have the ability to perform specific tasks and work together with other agents in a multi agent system to perform specific tasks and achieve the systemâ€™s goals. Agent systems are usually deployed to perform tasks on behalf of users, which is useful since it can abstract complex system tasks. For example, agents can cater for the security of the system for the user, without him having to be aware of it.\r\nIn terms of security, multi agent systems should address some basic issues such as authentication, confidentiality, integrity and access control, using well-known cryptographic mechanisms and techniques. An example of where multi agent systems have proved to be very useful is in the context of Electronic Healthcare (eHealth) for helping to solve interoperability issues that can arise when there is need to connect different heterogeneous eHealth systems. David Isern et al.  performs an interesting and complete review on this aspect. This can be achieved by establishing autonomous and asynchronous communications between different collaborating health care institutions. The security and privacy issues that arise within this interoperability contexts can then be handled with the appropriate identity and authentication management, and access control mechanisms and associated secure cryptographic protocols normally employed to secure these mechanisms.\r\n', 'evolutionofcomputercsc120305.docx', 'C', 1, 2, '2018-07-08 17:22:28'),
(3, 'Olumide Jacob', 'csc123456', 2017, 5, ' computer network', 'As the Internet constantly expands, the amount of available on-line information expands correspondingly. The issue of how to efficiently find, gather and retrieve this information has led to the research and development of systems and tools that attempt to provide a solution to this problem. These systems and tools are based on the use of MAsâ€™ technology.\r\nMobile agents are processes (e.g. executing programs) that can migrate from one machine of a system to another machine (usually in the same system) in order to satisfy requests made by their clients. Mainly, a mobile agent executes on a machine that hopefully provides the resource or service that it needs to perform its job. If the machine does not contain the needed resource/service, or if the mobile agent requires a different resource/service on another machine, the state information of the mobile agent is saved in pre-defined manner, then transfer to a machine containing the necessary resource/service is initiated, and the mobile agent resumes execution at the new machine. Advantages of using MAs include low network bandwidth since they only move when they need to continue execution even when disconnected from the network (typically for disconnected mode), ability to clone itself to perform parallel execution, easy implementation, deployment, and reliability. \r\n', 'computernetworkcsc123456.docx', 'C', 1, 1, '2018-07-03 08:23:06'),
(6, 'Alamu Gbenga', 'csc120501', 2018, 6, 'evolution of animation', 'Agents are usually defined as entities that function continuously and autonomously in specific environments. Mobile Agents should have the ability to perform specific tasks and work together with other agents in a multi agent system to perform specific tasks and achieve the systemâ€™s goals. Agent systems are usually deployed to perform tasks on behalf of users, which is useful since it can abstract complex system tasks. For example, agents can cater for the security of the system for the user, without him having to be aware of it.\r\nIn terms of security, multi agent systems should address some basic issues such as authentication, confidentiality, integrity and access control, using well-known cryptographic mechanisms and techniques. An example of where multi agent systems have proved to be very useful is in the context of Electronic Healthcare (eHealth) for helping to solve interoperability issues that can arise when there is need to connect different heterogeneous eHealth systems. David Isern et al.  performs an interesting and complete review on this aspect. This can be achieved by establishing autonomous and asynchronous communications between different collaborating health care institutions. The security and privacy issues that arise within this interoperability contexts can then be handled with the appropriate identity and authentication management, and access control mechanisms and associated secure cryptographic protocols normally employed to secure these mechanisms.\r\n', 'evolutionofcomputercsc120305.docx', 'C', 1, 2, '2018-07-08 17:22:28'),
(7, 'kabiru monsuru', 'csc123052', 2017, 5, ' computer network', 'As the Internet constantly expands, the amount of available on-line information expands correspondingly. The issue of how to efficiently find, gather and retrieve this information has led to the research and development of systems and tools that attempt to provide a solution to this problem. These systems and tools are based on the use of MAsâ€™ technology.\r\nMobile agents are processes (e.g. executing programs) that can migrate from one machine of a system to another machine (usually in the same system) in order to satisfy requests made by their clients. Mainly, a mobile agent executes on a machine that hopefully provides the resource or service that it needs to perform its job. If the machine does not contain the needed resource/service, or if the mobile agent requires a different resource/service on another machine, the state information of the mobile agent is saved in pre-defined manner, then transfer to a machine containing the necessary resource/service is initiated, and the mobile agent resumes execution at the new machine. Advantages of using MAs include low network bandwidth since they only move when they need to continue execution even when disconnected from the network (typically for disconnected mode), ability to clone itself to perform parallel execution, easy implementation, deployment, and reliability. \r\n', 'computernetworkcsc123456.docx', 'A', 1, 1, '2018-07-03 08:23:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
