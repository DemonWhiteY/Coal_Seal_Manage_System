-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2024-06-02 09:43:40
-- 服务器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `coal_seal_db`
--
CREATE DATABASE IF NOT EXISTS `coal_seal_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `coal_seal_db`;

-- --------------------------------------------------------

--
-- 表的结构 `coal`
--

CREATE TABLE `coal` (
  `ID` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `finish` varchar(10) NOT NULL DEFAULT 'No',
  `margin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `coal`
--

INSERT INTO `coal` (`ID`, `name`, `location`, `price`, `finish`, `margin`) VALUES
(1001, '面煤', '内蒙古', 750, 'No', 30),
(1002, '仔煤', '神木', 980, 'No', 10),
(1003, '块煤', '府谷', 2000, 'No', 30);

-- --------------------------------------------------------

--
-- 表的结构 `record`
--

CREATE TABLE `record` (
  `user` int(12) NOT NULL,
  `worker` int(50) NOT NULL DEFAULT 0,
  `num` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  `phone` int(50) NOT NULL,
  `coal_name` varchar(50) NOT NULL,
  `situation` varchar(50) NOT NULL DEFAULT 'No',
  `orderID` int(50) NOT NULL,
  `coalID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `record`
--

INSERT INTO `record` (`user`, `worker`, `num`, `address`, `time`, `phone`, `coal_name`, `situation`, `orderID`, `coalID`) VALUES
(20001, 10002, 1, '南海市幸福小区', '2024-05-31 12:41:36', 2147483647, '面煤', 'Finish', 9, 1001),
(20001, 10002, 2, '南海市希望化工', '2024-05-31 12:43:16', 3, '仔煤', 'Quit', 10, 1002),
(20001, 10002, 8, '南开大学', '2024-06-01 13:36:25', 18763421, '面煤', 'Quit', 11, 1001),
(20001, 0, 3, '久远小区', '2024-06-01 19:12:52', 2147483647, '面煤', 'No', 12, 1001),
(20001, 10002, 2, '南开大学', '2024-06-02 08:46:13', 3344553, ' 面煤', 'Yes', 18, 1001);

--
-- 触发器 `record`
--
DELIMITER $$
CREATE TRIGGER `before_record_insert` BEFORE INSERT ON `record` FOR EACH ROW BEGIN
    IF NEW.num >= 20 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'The value of num must be less than 20.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 替换视图以便查看 `record_overview`
-- （参见下面的实际视图）
--
CREATE TABLE `record_overview` (
`time` datetime
,`name` varchar(20)
,`workername` varchar(50)
,`address` varchar(50)
,`situation` varchar(50)
,`coal_name` varchar(50)
,`num` int(10)
);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `ID` int(12) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `pwd` varchar(60) NOT NULL,
  `tele` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  `phone` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `Address`, `pwd`, `tele`, `name`, `type`, `phone`) VALUES
(10001, '', '$2y$10$uT.51Ts3nWgj.FXBmtLHceH/CkStBKv9KA.Sdk8eZh7jbc8hjO08i', '10001@qq.com', '刘恒瑞', 'manager', 0),
(10002, '', '$2y$10$hyc5YTMxAMVQAmfMfgEH3.7w4qg.NhQgE1ArzzqWuPGqSjzawZ/MK', '10002@qq.com', '', 'worker', 0),
(10003, '天台市', '$2y$10$I5MoEnJn7.DuzfwH2bK7b.RariJHPwndaZ6khFn2g4/tfVMIpCUnu', '10003@163.com', '王子凯', 'worker', 15110565364),
(20001, '天台市', '$2y$10$aUcdg3VpZC20oF0NnLRGFO2irjOsLQgFsJVKIt9aC14wmrCPEJXn2', '20001@qq.com', '刘欣然', 'user', 15110565364),
(12345678, '', '$2y$10$yl1OHny1F9wCUDEhAIFr7OWvp.99Xd7oKRNf7SAeCn7isesxr8b1m', 'NKUyhr@163.com', '', 'user', 0);

-- --------------------------------------------------------

--
-- 表的结构 `worker`
--

CREATE TABLE `worker` (
  `ID` int(50) NOT NULL,
  `workername` varchar(50) NOT NULL,
  `task` int(50) NOT NULL,
  `mission_finish` int(10) NOT NULL,
  `phone` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `worker`
--

INSERT INTO `worker` (`ID`, `workername`, `task`, `mission_finish`, `phone`) VALUES
(0, '', 0, 0, 0),
(10002, '杨间', 0, 0, 18835007797),
(10003, '王子凯', 0, 0, 15110565364);

-- --------------------------------------------------------

--
-- 视图结构 `record_overview`
--
DROP TABLE IF EXISTS `record_overview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `record_overview`  AS SELECT `r`.`time` AS `time`, `u`.`name` AS `name`, `w`.`workername` AS `workername`, `r`.`address` AS `address`, `r`.`situation` AS `situation`, `r`.`coal_name` AS `coal_name`, `r`.`num` AS `num` FROM ((`record` `r` join `user` `u` on(`u`.`ID` = `r`.`user`)) join `worker` `w` on(`w`.`ID` = `r`.`worker`)) ;

--
-- 转储表的索引
--

--
-- 表的索引 `coal`
--
ALTER TABLE `coal`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `worker` (`worker`),
  ADD KEY `user` (`user`),
  ADD KEY `coalID` (`coalID`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `tele` (`tele`);

--
-- 表的索引 `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `coal`
--
ALTER TABLE `coal`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- 使用表AUTO_INCREMENT `record`
--
ALTER TABLE `record`
  MODIFY `orderID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 限制导出的表
--

--
-- 限制表 `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`worker`) REFERENCES `worker` (`ID`),
  ADD CONSTRAINT `record_ibfk_3` FOREIGN KEY (`coalID`) REFERENCES `coal` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
