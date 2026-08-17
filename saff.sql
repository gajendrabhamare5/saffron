-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2026 at 08:01 AM
-- Server version: 10.5.29-MariaDB-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saffron_bet`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `opp_user_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL DEFAULT 0,
  `account_description` varchar(255) DEFAULT NULL,
  `bet_id` int(11) NOT NULL DEFAULT 0,
  `event_id` varchar(255) NOT NULL,
  `game_type` int(11) NOT NULL COMMENT '0=sport,1=casino',
  `amount` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `entry_type` int(11) NOT NULL COMMENT '1=deposit,2=withdraw,3=bet,4=win,5=Generated,6=unmatchedbet,7=loss,8=settelment,9=commisionpaid 10=comm_win,11=Comm Settelment',
  `account_date_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=pending,1=active',
  `is_open_close` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(200) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `auto_pool` int(11) NOT NULL DEFAULT 0,
  `query_forwarding` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_backup`
--

CREATE TABLE `accounts_backup` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `opp_user_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL DEFAULT 0,
  `account_description` varchar(255) DEFAULT NULL,
  `bet_id` int(11) NOT NULL DEFAULT 0,
  `event_id` varchar(255) NOT NULL,
  `game_type` int(11) NOT NULL COMMENT '0=sport,1=casino',
  `amount` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `entry_type` int(11) NOT NULL COMMENT '1=deposit,2=withdraw,3=bet,4=win,5=Generated,6=unmatchedbet,7=loss,8=settelment,9=commisionpaid 10=comm_win,11=Comm Settelment',
  `account_date_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=pending,1=active',
  `is_open_close` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(200) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `auto_pool` int(11) NOT NULL DEFAULT 0,
  `query_forwarding` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_temp`
--

CREATE TABLE `accounts_temp` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `opp_user_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL DEFAULT 0,
  `account_description` varchar(255) DEFAULT NULL,
  `bet_id` int(11) NOT NULL DEFAULT 0,
  `event_id` varchar(255) NOT NULL,
  `game_type` int(11) NOT NULL COMMENT '0=sport,1=casino',
  `amount` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `entry_type` int(11) NOT NULL COMMENT '1=deposit,2=withdraw,3=bet,4=win,5=Generated,6=unmatchedbet,7=loss,8=settelment,9=commisionpaid 10=comm_win,11=Comm Settelment',
  `account_date_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=pending,1=active',
  `remark` varchar(200) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `auto_pool` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Triggers `accounts_temp`
--
DELIMITER $$
CREATE TRIGGER `accounts_temp_delete_trigger` BEFORE DELETE ON `accounts_temp` FOR EACH ROW BEGIN
   
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `accounts_temp_update_trigger` BEFORE UPDATE ON `accounts_temp` FOR EACH ROW BEGIN
	IF	NEW.account_id <> OLD.account_id || NEW.user_id <> OLD.user_id 
		|| NEW.opp_user_id <> OLD.opp_user_id || NEW.account_description <> OLD.account_description 
		|| NEW.bet_id <> OLD.bet_id || NEW.event_id <> OLD.event_id 
		|| NEW.game_type <> OLD.game_type || NEW.amount <> OLD.amount 
		|| NEW.type <> OLD.type || NEW.entry_type <> OLD.entry_type 
		|| NEW.account_date_time <> OLD.account_date_time || NEW.status <> OLD.status 
		|| NEW.remark <> OLD.remark || NEW.transaction_id <> OLD.transaction_id
	THEN
       	signal sqlstate "45000" set message_text = "Invalid update action.";
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_temp_test`
--

CREATE TABLE `accounts_temp_test` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `opp_user_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL DEFAULT 0,
  `account_description` varchar(255) DEFAULT NULL,
  `bet_id` int(11) NOT NULL DEFAULT 0,
  `event_id` varchar(255) NOT NULL,
  `game_type` int(11) NOT NULL COMMENT '0=sport,1=casino',
  `amount` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `entry_type` int(11) NOT NULL COMMENT '1=deposit,2=withdraw,3=bet,4=win,5=Generated,6=unmatchedbet,7=loss,8=settelment,9=commisionpaid 10=comm_win,11=Comm Settelment',
  `account_date_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=pending,1=active',
  `remark` varchar(200) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `auto_pool` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_old_entry`
--

CREATE TABLE `account_old_entry` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `amount` double NOT NULL,
  `amount2` double NOT NULL,
  `is_updated` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `log_type` varchar(255) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `Id` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_preference`
--

CREATE TABLE `admin_preference` (
  `id` int(11) NOT NULL,
  `preference_name` varchar(255) NOT NULL,
  `preference_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Triggers `admin_preference`
--
DELIMITER $$
CREATE TRIGGER `admin_preference_delete` BEFORE INSERT ON `admin_preference` FOR EACH ROW BEGIN
     signal sqlstate "45000" set message_text = "Invalid delete action.";
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_block_details`
--

CREATE TABLE `bet_block_details` (
  `bet_block_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `block_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=no,1=match_book,2=fancy',
  `market_type` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL DEFAULT 0,
  `added_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_cancelled_log`
--

CREATE TABLE `bet_cancelled_log` (
  `log_id` int(11) NOT NULL,
  `bet_id` text DEFAULT NULL,
  `event_type` int(11) NOT NULL DEFAULT 0,
  `event_id` int(11) NOT NULL DEFAULT 0,
  `market_id` int(11) NOT NULL DEFAULT 0,
  `yes_run` varchar(255) DEFAULT '0',
  `no_run` varchar(255) DEFAULT '0',
  `yes_size` varchar(255) NOT NULL,
  `no_size` varchar(255) NOT NULL,
  `start_date_time` datetime DEFAULT NULL,
  `end_date_time` datetime DEFAULT NULL,
  `ip_adderss` varchar(255) NOT NULL DEFAULT '0',
  `user_agent` varchar(255) NOT NULL DEFAULT '0',
  `added_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_delay_master`
--

CREATE TABLE `bet_delay_master` (
  `Id` int(11) NOT NULL,
  `market_type_id` int(11) DEFAULT NULL,
  `market_type_name` text DEFAULT NULL,
  `delay_value` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_delay_master_log`
--

CREATE TABLE `bet_delay_master_log` (
  `Id` int(11) NOT NULL,
  `market_type_id` int(11) DEFAULT NULL,
  `market_type_name` text DEFAULT NULL,
  `old_delay_value` decimal(10,2) DEFAULT NULL,
  `new_delay_value` decimal(10,2) DEFAULT NULL,
  `ip_address` text DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_delete_otp`
--

CREATE TABLE `bet_delete_otp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bet_id` int(11) DEFAULT NULL,
  `bet_type` varchar(30) DEFAULT NULL,
  `otp` int(10) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_details`
--

CREATE TABLE `bet_details` (
  `bet_id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL DEFAULT 0,
  `event_id` varchar(255) DEFAULT NULL,
  `oddsmarketId` varchar(255) DEFAULT NULL,
  `market_id` varchar(255) DEFAULT NULL,
  `meter_market_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `event_name` varchar(255) DEFAULT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `market_type` varchar(255) DEFAULT NULL,
  `display_market_type` varchar(255) DEFAULT NULL,
  `bet_type` varchar(255) DEFAULT NULL,
  `bet_runs` varchar(255) DEFAULT NULL,
  `bet_runs2` varchar(255) NOT NULL DEFAULT '0',
  `bet_odds` varchar(255) DEFAULT NULL,
  `bet_stack` varchar(255) DEFAULT NULL,
  `bet_comm` varchar(255) NOT NULL DEFAULT '0',
  `bet_result` varchar(255) DEFAULT NULL,
  `bet_margin_used` varchar(255) DEFAULT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) DEFAULT NULL,
  `bet_time` datetime DEFAULT NULL,
  `bet_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=settled,1=active,2=cancelled',
  `bet_ip_address` varchar(255) DEFAULT NULL,
  `bet_user_agent` varchar(150) DEFAULT NULL,
  `bet_final_result` varchar(80) DEFAULT NULL,
  `runner_id` varchar(255) NOT NULL DEFAULT '0',
  `runner_name1` varchar(255) DEFAULT NULL,
  `bet_run_result` varchar(255) NOT NULL DEFAULT '0',
  `bet_result_time` datetime DEFAULT NULL,
  `oldGameId` double NOT NULL DEFAULT 0,
  `data` text DEFAULT '\'\'',
  `winner_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Triggers `bet_details`
--
DELIMITER $$
CREATE TRIGGER `bet_details_delete1_trigger` BEFORE DELETE ON `bet_details` FOR EACH ROW BEGIN
		 signal sqlstate "45000" set message_text = "Invalid delete action.";
	END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bet_details_update_trigger` BEFORE UPDATE ON `bet_details` FOR EACH ROW BEGIN
	IF NEW.bet_id <> OLD.bet_id || NEW.market_id <> OLD.market_id 
		|| NEW.event_id <> OLD.event_id || NEW.event_type <> OLD.event_type 
		|| NEW.user_id <> OLD.user_id || NEW.event_name <> OLD.event_name 
		|| NEW.market_name <> OLD.market_name || NEW.market_type <> OLD.market_type 
		|| NEW.bet_type <> OLD.bet_type || NEW.bet_runs <> OLD.bet_runs 
		|| NEW.bet_runs2 <> OLD.bet_runs2 || NEW.bet_odds <> OLD.bet_odds 
		|| NEW.bet_stack <> OLD.bet_stack || NEW.bet_stack <> OLD.bet_stack 
		|| NEW.bet_margin_used <> OLD.bet_margin_used || NEW.bet_win_amount <> OLD.bet_win_amount 
		|| NEW.bet_time <> OLD.bet_time 
	THEN
       	signal sqlstate '45000' set message_text = "Invalid update action.";
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bet_details2`
--

CREATE TABLE `bet_details2` (
  `bet_id` int(11) NOT NULL DEFAULT 0,
  `event_type` int(11) NOT NULL DEFAULT 0,
  `event_id` varchar(255) DEFAULT NULL,
  `oddsmarketId` varchar(255) DEFAULT NULL,
  `market_id` varchar(255) DEFAULT NULL,
  `meter_market_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `event_name` varchar(255) DEFAULT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `market_type` varchar(255) DEFAULT NULL,
  `bet_type` varchar(255) DEFAULT NULL,
  `bet_runs` varchar(255) DEFAULT NULL,
  `bet_runs2` varchar(255) NOT NULL DEFAULT '0',
  `bet_odds` varchar(255) DEFAULT NULL,
  `bet_stack` varchar(255) DEFAULT NULL,
  `bet_comm` varchar(255) NOT NULL DEFAULT '0',
  `bet_result` varchar(255) DEFAULT NULL,
  `bet_margin_used` varchar(255) DEFAULT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) DEFAULT NULL,
  `bet_time` datetime DEFAULT NULL,
  `bet_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=settled,1=active,2=cancelled',
  `bet_ip_address` varchar(255) DEFAULT NULL,
  `bet_user_agent` varchar(150) DEFAULT NULL,
  `bet_final_result` varchar(80) DEFAULT NULL,
  `runner_id` varchar(255) NOT NULL DEFAULT '0',
  `runner_name1` varchar(255) DEFAULT NULL,
  `bet_run_result` varchar(255) NOT NULL DEFAULT '0',
  `bet_result_time` datetime DEFAULT NULL,
  `oldGameId` double NOT NULL DEFAULT 0,
  `data` text DEFAULT '\'\'',
  `winner_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_details_api_data`
--

CREATE TABLE `bet_details_api_data` (
  `bet_details_id` int(11) NOT NULL,
  `bet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `added_datetime` datetime NOT NULL,
  `is_sport` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_details_api_data_old_data`
--

CREATE TABLE `bet_details_api_data_old_data` (
  `bet_details_id` int(11) NOT NULL,
  `bet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `added_datetime` datetime NOT NULL,
  `is_sport` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_details_deleted`
--

CREATE TABLE `bet_details_deleted` (
  `bet_deleted_id` int(11) NOT NULL,
  `bet_id` int(11) NOT NULL DEFAULT 0,
  `event_type` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `oddsmarketId` varchar(255) NOT NULL,
  `market_id` varchar(255) NOT NULL,
  `meter_market_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `market_name` varchar(255) NOT NULL,
  `market_type` varchar(255) NOT NULL,
  `bet_type` varchar(255) NOT NULL,
  `bet_runs` varchar(255) NOT NULL,
  `bet_runs2` varchar(255) NOT NULL,
  `bet_odds` varchar(255) NOT NULL,
  `bet_stack` varchar(255) NOT NULL,
  `bet_comm` varchar(255) NOT NULL DEFAULT '0',
  `bet_result` varchar(255) NOT NULL,
  `bet_margin_used` varchar(255) NOT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) NOT NULL,
  `bet_time` datetime NOT NULL,
  `bet_status` int(11) NOT NULL COMMENT '0=settled,1=active,2=cancelled',
  `bet_ip_address` varchar(255) NOT NULL,
  `bet_user_agent` varchar(150) NOT NULL,
  `bet_final_result` varchar(80) NOT NULL,
  `runner_id` int(11) NOT NULL DEFAULT 0,
  `runner_name1` varchar(255) DEFAULT NULL,
  `deleted_time` datetime DEFAULT NULL,
  `deleted_ip_address` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Triggers `bet_details_deleted`
--
DELIMITER $$
CREATE TRIGGER `bet_details_deleted_delete1_trigger` BEFORE DELETE ON `bet_details_deleted` FOR EACH ROW BEGIN
     signal sqlstate "45000" set message_text = "Invalid delete action.";
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bet_details_deleted_update_trigger` BEFORE UPDATE ON `bet_details_deleted` FOR EACH ROW BEGIN
	IF 	NEW.bet_id <> OLD.bet_id || NEW.market_id <> OLD.market_id 
		|| NEW.event_id <> OLD.event_id || NEW.event_type <> OLD.event_type 
		|| NEW.user_id <> OLD.user_id || NEW.event_name <> OLD.event_name 
		|| NEW.market_name <> OLD.market_name || NEW.market_type <> OLD.market_type 
		|| NEW.bet_type <> OLD.bet_type || NEW.bet_runs <> OLD.bet_runs 
		|| NEW.bet_runs2 <> OLD.bet_runs2 || NEW.bet_odds <> OLD.bet_odds 
		|| NEW.bet_stack <> OLD.bet_stack || NEW.bet_stack <> OLD.bet_stack 
		|| NEW.bet_margin_used <> OLD.bet_margin_used || NEW.bet_win_amount <> OLD.bet_win_amount 
		|| NEW.bet_time <> OLD.bet_time 
	THEN
       	signal sqlstate '45000' set message_text = "Invalid update action.";
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bet_details_old_data`
--

CREATE TABLE `bet_details_old_data` (
  `bet_id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL DEFAULT 0,
  `event_id` varchar(255) DEFAULT NULL,
  `oddsmarketId` varchar(255) DEFAULT NULL,
  `market_id` varchar(255) DEFAULT NULL,
  `meter_market_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `event_name` varchar(255) DEFAULT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `market_type` varchar(255) DEFAULT NULL,
  `display_market_type` varchar(255) DEFAULT NULL,
  `bet_type` varchar(255) DEFAULT NULL,
  `bet_runs` varchar(255) DEFAULT NULL,
  `bet_runs2` varchar(255) NOT NULL DEFAULT '0',
  `bet_odds` varchar(255) DEFAULT NULL,
  `bet_stack` varchar(255) DEFAULT NULL,
  `bet_comm` varchar(255) NOT NULL DEFAULT '0',
  `bet_result` varchar(255) DEFAULT NULL,
  `bet_margin_used` varchar(255) DEFAULT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) DEFAULT NULL,
  `bet_time` datetime DEFAULT NULL,
  `bet_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=settled,1=active,2=cancelled',
  `bet_ip_address` varchar(255) DEFAULT NULL,
  `bet_user_agent` varchar(150) DEFAULT NULL,
  `bet_final_result` varchar(80) DEFAULT NULL,
  `runner_id` varchar(255) NOT NULL DEFAULT '0',
  `runner_name1` varchar(255) DEFAULT NULL,
  `bet_run_result` varchar(255) NOT NULL DEFAULT '0',
  `bet_result_time` datetime DEFAULT NULL,
  `oldGameId` double NOT NULL DEFAULT 0,
  `data` text DEFAULT '\'\'',
  `winner_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_market_suspend_master`
--

CREATE TABLE `bet_market_suspend_master` (
  `id` int(11) NOT NULL,
  `event_id` text DEFAULT NULL,
  `sport_id` text DEFAULT NULL,
  `market_type` text DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_success_log`
--

CREATE TABLE `bet_success_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_market_name` varchar(80) NOT NULL,
  `api_data` longtext DEFAULT NULL,
  `api_url` varchar(180) DEFAULT NULL,
  `bet_id` varchar(80) DEFAULT NULL,
  `log_details` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `page_call_time` datetime DEFAULT NULL,
  `log_time` datetime NOT NULL,
  `game_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_success_log_old_data`
--

CREATE TABLE `bet_success_log_old_data` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_market_name` varchar(80) NOT NULL,
  `api_data` longtext DEFAULT NULL,
  `api_url` varchar(180) DEFAULT NULL,
  `bet_id` varchar(80) DEFAULT NULL,
  `log_details` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `page_call_time` datetime DEFAULT NULL,
  `log_time` datetime NOT NULL,
  `game_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_success_log_test`
--

CREATE TABLE `bet_success_log_test` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_market_name` varchar(80) NOT NULL,
  `api_data` longtext DEFAULT NULL,
  `api_url` varchar(180) DEFAULT NULL,
  `bet_id` varchar(80) DEFAULT NULL,
  `log_details` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `page_call_time` datetime DEFAULT NULL,
  `log_time` datetime NOT NULL,
  `game_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_teen_details`
--

CREATE TABLE `bet_teen_details` (
  `bet_id` double NOT NULL,
  `event_type` varchar(255) DEFAULT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `oddsmarketId` varchar(255) DEFAULT NULL,
  `market_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `event_name` varchar(255) DEFAULT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `market_type` varchar(255) DEFAULT NULL,
  `bet_type` varchar(255) DEFAULT NULL,
  `bet_runs` varchar(255) DEFAULT NULL,
  `bet_odds` varchar(255) DEFAULT NULL,
  `bet_stack` varchar(255) DEFAULT NULL,
  `bet_result` varchar(255) DEFAULT NULL,
  `bet_margin_used` varchar(255) DEFAULT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) DEFAULT NULL,
  `bet_time` datetime DEFAULT NULL,
  `bet_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=settled,1=active,2=cancelled',
  `cancelled_by` int(11) NOT NULL DEFAULT 0 COMMENT '0=cron,1=admin,2=6hr cron',
  `bet_ip_address` varchar(120) DEFAULT NULL,
  `bet_user_agent` varchar(150) DEFAULT NULL,
  `bet_final_result` varchar(80) DEFAULT NULL,
  `joker_card` varchar(255) DEFAULT NULL,
  `randomkey` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Triggers `bet_teen_details`
--
DELIMITER $$
CREATE TRIGGER `bet_teen_details_delete1_trigger` BEFORE DELETE ON `bet_teen_details` FOR EACH ROW BEGIN
		 signal sqlstate "45000" set message_text = "Invalid delete action.";
	END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bet_teen_details_update_trigger` BEFORE UPDATE ON `bet_teen_details` FOR EACH ROW BEGIN
	
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bet_teen_details_ak`
--

CREATE TABLE `bet_teen_details_ak` (
  `bet_id` double NOT NULL,
  `event_type` varchar(255) DEFAULT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `oddsmarketId` varchar(255) DEFAULT NULL,
  `market_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `event_name` varchar(255) DEFAULT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `market_type` varchar(255) DEFAULT NULL,
  `bet_type` varchar(255) DEFAULT NULL,
  `bet_runs` varchar(255) DEFAULT NULL,
  `bet_odds` varchar(255) DEFAULT NULL,
  `bet_stack` varchar(255) DEFAULT NULL,
  `bet_result` varchar(255) DEFAULT NULL,
  `bet_margin_used` varchar(255) DEFAULT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) DEFAULT NULL,
  `bet_time` datetime DEFAULT NULL,
  `bet_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=settled,1=active,2=cancelled',
  `cancelled_by` int(11) NOT NULL DEFAULT 0 COMMENT '0=cron,1=admin',
  `bet_ip_address` varchar(120) DEFAULT NULL,
  `bet_user_agent` varchar(150) DEFAULT NULL,
  `bet_final_result` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_teen_details_deleted`
--

CREATE TABLE `bet_teen_details_deleted` (
  `bet_deleted_id` double NOT NULL,
  `bet_id` int(11) NOT NULL DEFAULT 0,
  `event_type` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `oddsmarketId` varchar(255) NOT NULL,
  `market_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `market_name` varchar(255) NOT NULL,
  `market_type` varchar(255) NOT NULL,
  `bet_type` varchar(255) NOT NULL,
  `bet_runs` varchar(255) NOT NULL,
  `bet_odds` varchar(255) NOT NULL,
  `bet_stack` varchar(255) NOT NULL,
  `bet_result` varchar(255) NOT NULL,
  `bet_margin_used` varchar(255) NOT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) NOT NULL,
  `bet_time` datetime NOT NULL,
  `bet_status` int(11) NOT NULL COMMENT '0=settled,1=active,2=cancelled',
  `cancelled_by` int(11) NOT NULL DEFAULT 0 COMMENT '0=cron,1=admin',
  `bet_ip_address` varchar(120) NOT NULL,
  `bet_user_agent` varchar(150) NOT NULL,
  `bet_final_result` varchar(80) NOT NULL,
  `deleted_time` datetime DEFAULT NULL,
  `deleted_ip_address` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Triggers `bet_teen_details_deleted`
--
DELIMITER $$
CREATE TRIGGER `bet_teen_details_deleted_delete1_trigger` BEFORE DELETE ON `bet_teen_details_deleted` FOR EACH ROW BEGIN
     signal sqlstate "45000" set message_text = "Invalid delete action.";
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bet_teen_details_deleted_update_trigger` BEFORE UPDATE ON `bet_teen_details_deleted` FOR EACH ROW BEGIN
	IF 	NEW.bet_id <> OLD.bet_id || NEW.event_type <> OLD.event_type 
		|| NEW.event_id <> OLD.event_id || NEW.oddsmarketId <> OLD.oddsmarketId 
		|| NEW.market_id <> OLD.market_id || NEW.user_id <> OLD.user_id 
		|| NEW.event_name <> OLD.event_name || NEW.market_name <> OLD.market_name 
		|| NEW.market_type <> OLD.market_type || NEW.bet_type <> OLD.bet_type 
		|| NEW.bet_runs <> OLD.bet_runs || NEW.bet_odds <> OLD.bet_odds 
		|| NEW.bet_stack <> OLD.bet_stack ||  NEW.bet_margin_used <> OLD.bet_margin_used || NEW.bet_time <> OLD.bet_time 
	THEN
       
       		signal sqlstate '45000' set message_text = "Invalid update action.";
       	
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bet_teen_details_old_data`
--

CREATE TABLE `bet_teen_details_old_data` (
  `bet_id` double NOT NULL,
  `event_type` varchar(255) DEFAULT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `oddsmarketId` varchar(255) DEFAULT NULL,
  `market_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `event_name` varchar(255) DEFAULT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `market_type` varchar(255) DEFAULT NULL,
  `bet_type` varchar(255) DEFAULT NULL,
  `bet_runs` varchar(255) DEFAULT NULL,
  `bet_odds` varchar(255) DEFAULT NULL,
  `bet_stack` varchar(255) DEFAULT NULL,
  `bet_result` varchar(255) DEFAULT NULL,
  `bet_margin_used` varchar(255) DEFAULT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) DEFAULT NULL,
  `bet_time` datetime DEFAULT NULL,
  `bet_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=settled,1=active,2=cancelled',
  `cancelled_by` int(11) NOT NULL DEFAULT 0 COMMENT '0=cron,1=admin',
  `bet_ip_address` varchar(120) DEFAULT NULL,
  `bet_user_agent` varchar(150) DEFAULT NULL,
  `bet_final_result` varchar(80) DEFAULT NULL,
  `joker_card` varchar(255) DEFAULT NULL,
  `randomkey` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bet_teen_details_old_dta`
--

CREATE TABLE `bet_teen_details_old_dta` (
  `bet_id` double NOT NULL,
  `event_type` varchar(255) DEFAULT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `oddsmarketId` varchar(255) DEFAULT NULL,
  `market_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `event_name` varchar(255) DEFAULT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `market_type` varchar(255) DEFAULT NULL,
  `bet_type` varchar(255) DEFAULT NULL,
  `bet_runs` varchar(255) DEFAULT NULL,
  `bet_odds` varchar(255) DEFAULT NULL,
  `bet_stack` varchar(255) DEFAULT NULL,
  `bet_result` varchar(255) DEFAULT NULL,
  `bet_margin_used` varchar(255) DEFAULT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) DEFAULT NULL,
  `bet_time` datetime DEFAULT NULL,
  `bet_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=settled,1=active,2=cancelled',
  `cancelled_by` int(11) NOT NULL DEFAULT 0 COMMENT '0=cron,1=admin,2=6hr cron',
  `bet_ip_address` varchar(120) DEFAULT NULL,
  `bet_user_agent` varchar(150) DEFAULT NULL,
  `bet_final_result` varchar(80) DEFAULT NULL,
  `joker_card` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block_bet_id`
--

CREATE TABLE `block_bet_id` (
  `bb_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `block_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block_event`
--

CREATE TABLE `block_event` (
  `id` int(11) NOT NULL,
  `UserId` int(50) NOT NULL,
  `block_by` varchar(255) DEFAULT NULL,
  `sport_type` varchar(255) NOT NULL,
  `casino_name` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block_event_id`
--

CREATE TABLE `block_event_id` (
  `be_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `block_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block_market_id`
--

CREATE TABLE `block_market_id` (
  `bm_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `block_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block_sport`
--

CREATE TABLE `block_sport` (
  `bs_id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `block_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `casino_cricket_20_20_rules`
--

CREATE TABLE `casino_cricket_20_20_rules` (
  `id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `market_name` varchar(255) NOT NULL,
  `run_winner_market_id` varchar(255) NOT NULL,
  `winner_market_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `casino_list`
--

CREATE TABLE `casino_list` (
  `id` int(11) NOT NULL,
  `game_code` varchar(255) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_url` varchar(255) NOT NULL,
  `game_category` varchar(255) NOT NULL,
  `game_image` varchar(500) NOT NULL,
  `cat_priority` int(11) DEFAULT NULL,
  `game_socket` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `iframe_url` varchar(255) NOT NULL,
  `result_card_image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `is_live` int(11) NOT NULL COMMENT '1:live 0:stop',
  `status` int(11) NOT NULL COMMENT '1:upcoming 0:live'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `casino_maintanance_list`
--

CREATE TABLE `casino_maintanance_list` (
  `Id` int(11) NOT NULL,
  `casino_name` text NOT NULL,
  `ip_address` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `casino_under_maintanance`
--

CREATE TABLE `casino_under_maintanance` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `ip_address` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission_master`
--

CREATE TABLE `commission_master` (
  `comm_id` int(11) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `account_temp_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `bet_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `comm_amount` varchar(255) NOT NULL,
  `comm_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `continues_bet_details`
--

CREATE TABLE `continues_bet_details` (
  `bet_id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `market_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `market_name` varchar(255) NOT NULL,
  `market_type` varchar(255) NOT NULL,
  `bet_type` varchar(255) NOT NULL,
  `bet_runs` varchar(255) NOT NULL,
  `bet_odds` varchar(255) NOT NULL,
  `bet_stack` varchar(255) NOT NULL,
  `bet_result` varchar(255) NOT NULL,
  `bet_margin_used` varchar(255) NOT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) NOT NULL,
  `bet_time` varchar(255) NOT NULL,
  `bet_status` int(11) NOT NULL COMMENT '0=settled,1=active,2=cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cookie_details`
--

CREATE TABLE `cookie_details` (
  `cookie_id` int(11) NOT NULL,
  `pc_no` int(11) NOT NULL,
  `value_1` varchar(255) NOT NULL,
  `value_2` varchar(255) NOT NULL,
  `value_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cron_auto_casino`
--

CREATE TABLE `cron_auto_casino` (
  `id` int(11) NOT NULL,
  `added_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE `employee_master` (
  `id` int(11) NOT NULL,
  `added_by_id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privileges` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_casino_market_id`
--

CREATE TABLE `event_casino_market_id` (
  `em_id` int(11) NOT NULL,
  `market_id` varchar(255) NOT NULL,
  `market_name` varchar(255) NOT NULL,
  `back_name` varchar(255) NOT NULL,
  `market_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_casino_market_id2`
--

CREATE TABLE `event_casino_market_id2` (
  `em_id` int(11) NOT NULL,
  `market_id` varchar(255) NOT NULL,
  `market_name` varchar(255) NOT NULL,
  `back_name` varchar(255) NOT NULL,
  `market_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_delay_master`
--

CREATE TABLE `event_delay_master` (
  `Id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `delay_value` decimal(10,2) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_market_id`
--

CREATE TABLE `event_market_id` (
  `em_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `runner_id` varchar(255) NOT NULL DEFAULT '0',
  `market_name` varchar(255) NOT NULL,
  `market_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_market_limit`
--

CREATE TABLE `event_market_limit` (
  `limit_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL DEFAULT 0,
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `oddsmarketId` varchar(55) NOT NULL,
  `match_min` int(11) NOT NULL DEFAULT 500,
  `match_max` int(11) NOT NULL DEFAULT 200000,
  `match_early_max` int(11) NOT NULL DEFAULT 0,
  `bookmaker_min` int(11) NOT NULL DEFAULT 500,
  `bookmaker_max` int(11) NOT NULL DEFAULT 200000,
  `bookmaker_live` int(11) NOT NULL DEFAULT 0,
  `matchdate` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=on going, 1=finished'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_market_remarks`
--

CREATE TABLE `event_market_remarks` (
  `id` int(11) NOT NULL,
  `eventType` varchar(11) DEFAULT NULL,
  `eventId` varchar(255) NOT NULL,
  `marketId` varchar(255) NOT NULL,
  `marketName` varchar(255) DEFAULT NULL,
  `remarks` text NOT NULL,
  `response` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_min_max`
--

CREATE TABLE `event_min_max` (
  `id` int(11) NOT NULL,
  `sport_name` varchar(255) DEFAULT NULL,
  `marketId` varchar(255) DEFAULT NULL,
  `eventName` varchar(255) DEFAULT NULL,
  `eventId` varchar(255) DEFAULT NULL,
  `min_bet` varchar(255) DEFAULT NULL,
  `max_bet` varchar(255) DEFAULT NULL,
  `market_type` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_name_code`
--

CREATE TABLE `event_name_code` (
  `event_name_code_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `diamond_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exposure_details`
--

CREATE TABLE `exposure_details` (
  `exposure_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `event_type` int(11) NOT NULL DEFAULT 0,
  `event_id` varchar(255) NOT NULL DEFAULT '0',
  `market_id` varchar(255) NOT NULL DEFAULT '0',
  `casino_back_name` varchar(255) NOT NULL DEFAULT '0',
  `meter_market_id` int(11) NOT NULL DEFAULT 0,
  `market_type` varchar(255) NOT NULL DEFAULT '0',
  `exposure_amount` varchar(255) NOT NULL DEFAULT '0',
  `max_winning_amount` double NOT NULL DEFAULT 0,
  `exposure_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hdmi_tv_master`
--

CREATE TABLE `hdmi_tv_master` (
  `tv_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `hdmi_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_custom_event_list`
--

CREATE TABLE `home_custom_event_list` (
  `id` int(11) NOT NULL,
  `sport_type` varchar(255) NOT NULL,
  `market_id` double NOT NULL,
  `event_id` double NOT NULL,
  `event_name` mediumtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_image`
--

CREATE TABLE `home_image` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(5000) NOT NULL,
  `device` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_image2`
--

CREATE TABLE `home_image2` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(5000) NOT NULL,
  `device` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kbc_teen_bet`
--

CREATE TABLE `kbc_teen_bet` (
  `id` int(11) NOT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `bet_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `market_id` varchar(255) DEFAULT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `bet_type` varchar(255) DEFAULT NULL,
  `bet_status` int(11) DEFAULT 1 COMMENT '0=settled,1=active,2=cancelled	',
  `date_time` datetime DEFAULT NULL,
  `bet_final_result` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_cookie`
--

CREATE TABLE `login_cookie` (
  `login_id` int(11) NOT NULL,
  `login_cookie_data` text NOT NULL,
  `pc_no` int(11) NOT NULL,
  `csrf` varchar(255) NOT NULL,
  `xsrf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_ip_address`
--

CREATE TABLE `login_ip_address` (
  `login_ip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `login_page` text DEFAULT NULL,
  `login_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_ip_address_old_data`
--

CREATE TABLE `login_ip_address_old_data` (
  `login_ip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `login_page` text DEFAULT NULL,
  `login_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_sport_cookie`
--

CREATE TABLE `login_sport_cookie` (
  `login_sport_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `logo_image` varchar(5000) NOT NULL,
  `name` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_failed_bet`
--

CREATE TABLE `mail_failed_bet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `user_name` varchar(80) NOT NULL DEFAULT '',
  `bet_id` int(11) NOT NULL DEFAULT 0,
  `game_type` tinyint(4) NOT NULL DEFAULT 0,
  `event_type` varchar(80) NOT NULL DEFAULT '0',
  `subject` varchar(180) NOT NULL DEFAULT '',
  `body` longtext NOT NULL DEFAULT '',
  `reason` varchar(80) NOT NULL DEFAULT '',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manual_event_details`
--

CREATE TABLE `manual_event_details` (
  `manual_event_id` int(11) NOT NULL,
  `manual_event_type` int(11) NOT NULL,
  `manual_event_name` varchar(255) NOT NULL,
  `manual_event_inplay` int(11) NOT NULL,
  `manual_event_status` varchar(255) NOT NULL,
  `manual_event_datetime` datetime NOT NULL,
  `manual_event_added_by` int(11) NOT NULL,
  `manual_event_added_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manual_event_market_details`
--

CREATE TABLE `manual_event_market_details` (
  `manual_market_id` int(11) NOT NULL,
  `manual_event_id` int(11) NOT NULL,
  `manual_market_name` varchar(255) NOT NULL,
  `manual_market_status` varchar(255) NOT NULL,
  `manual_market_added_by` int(11) NOT NULL,
  `manual_market_added_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manual_event_selectors_details`
--

CREATE TABLE `manual_event_selectors_details` (
  `manual_selectors_id` int(11) NOT NULL,
  `manual_event_id` int(11) NOT NULL,
  `manual_market_id` int(11) NOT NULL,
  `manual_selectors_name` varchar(255) NOT NULL,
  `manual_selectors_price` varchar(255) NOT NULL,
  `manual_selectors_addedby` int(11) NOT NULL,
  `manual_selectors_added_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marquee_master`
--

CREATE TABLE `marquee_master` (
  `id` int(11) NOT NULL,
  `marquee` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marquee_message`
--

CREATE TABLE `marquee_message` (
  `marquee_id` int(11) NOT NULL,
  `marquee_data` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `added_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meter_market_mapping`
--

CREATE TABLE `meter_market_mapping` (
  `meter_mapping_id` int(11) NOT NULL,
  `oddsmarket_id` varchar(255) NOT NULL,
  `spread_id` varchar(255) NOT NULL,
  `site_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges_master`
--

CREATE TABLE `privileges_master` (
  `id` int(11) NOT NULL,
  `privilleges_name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register_request`
--

CREATE TABLE `register_request` (
  `request_id` int(11) NOT NULL,
  `your_name` varchar(255) NOT NULL,
  `your_email` varchar(255) NOT NULL,
  `your_phone` varchar(255) NOT NULL,
  `your_country` varchar(255) NOT NULL,
  `request_status` int(11) NOT NULL,
  `request_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_log`
--

CREATE TABLE `rejection_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_market_name` varchar(80) NOT NULL,
  `api_data` longtext DEFAULT NULL,
  `api_url` varchar(80) DEFAULT NULL,
  `log_error` varchar(80) NOT NULL,
  `log_details` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `page_call_time` datetime DEFAULT NULL,
  `log_time` datetime NOT NULL,
  `game_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_log_old_data`
--

CREATE TABLE `rejection_log_old_data` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_market_name` varchar(80) NOT NULL,
  `api_data` longtext DEFAULT NULL,
  `api_url` varchar(180) DEFAULT NULL,
  `log_error` varchar(80) NOT NULL,
  `log_details` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `page_call_time` datetime DEFAULT NULL,
  `log_time` datetime NOT NULL,
  `game_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `eventType` varchar(255) DEFAULT NULL,
  `eventId` varchar(255) DEFAULT NULL,
  `marketId` varchar(255) DEFAULT NULL,
  `runs` varchar(255) DEFAULT NULL,
  `marketName` varchar(255) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `added_by` int(11) NOT NULL DEFAULT 0,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result_block_details`
--

CREATE TABLE `result_block_details` (
  `result_block_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `market_id` varchar(255) NOT NULL,
  `result_amount` varchar(255) NOT NULL,
  `result_rate` varchar(255) NOT NULL,
  `market_type` varchar(255) NOT NULL,
  `result_status` int(11) NOT NULL DEFAULT 1,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result_match_odds`
--

CREATE TABLE `result_match_odds` (
  `id` int(11) NOT NULL,
  `eventId` varchar(255) DEFAULT NULL,
  `selectionId` int(11) NOT NULL DEFAULT 0,
  `runnerName` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `datetime` datetime DEFAULT NULL,
  `added_by` int(11) NOT NULL DEFAULT 0,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `is_bookmaker` int(11) NOT NULL DEFAULT 0 COMMENT '0=match odds,1 = bookmaker'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result_summery_logs`
--

CREATE TABLE `result_summery_logs` (
  `id` int(11) NOT NULL,
  `eventId` varchar(255) NOT NULL,
  `selectionId` int(11) NOT NULL,
  `runnerName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `added_by` int(11) NOT NULL DEFAULT 0,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `is_bookmaker` int(11) NOT NULL DEFAULT 0 COMMENT '0=match odds,1 = bookmaker'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roulette_bet_details`
--

CREATE TABLE `roulette_bet_details` (
  `roulette_bet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` double NOT NULL,
  `number` int(11) NOT NULL,
  `bet_amount` varchar(255) NOT NULL,
  `bet_winning_amount` varchar(255) NOT NULL,
  `roulette_bet_result` varchar(255) NOT NULL,
  `roulette_bet_status` int(11) NOT NULL,
  `roulette_bet_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roulette_game_details`
--

CREATE TABLE `roulette_game_details` (
  `game_id` int(11) NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `number` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roulette_profit_details`
--

CREATE TABLE `roulette_profit_details` (
  `roulette_profit_id` int(11) NOT NULL,
  `roulette_total_bet` double NOT NULL,
  `roulette_total_profit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settlement`
--

CREATE TABLE `settlement` (
  `id` int(11) NOT NULL,
  `our_pnl` decimal(10,0) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `add_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_under_maintenance`
--

CREATE TABLE `site_under_maintenance` (
  `id` int(11) NOT NULL,
  `site_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sport_list`
--

CREATE TABLE `sport_list` (
  `id` int(11) NOT NULL,
  `sport_id` int(11) DEFAULT NULL,
  `sport_name` varchar(255) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL COMMENT '0=show , 1=delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telegram_webook_response`
--

CREATE TABLE `telegram_webook_response` (
  `id` int(11) NOT NULL,
  `response` text DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_export`
--

CREATE TABLE `temp_export` (
  `bet_id` int(11) NOT NULL DEFAULT 0,
  `event_type` int(11) NOT NULL DEFAULT 0,
  `event_id` varchar(255) DEFAULT NULL,
  `oddsmarketId` varchar(255) DEFAULT NULL,
  `market_id` varchar(255) DEFAULT NULL,
  `meter_market_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `event_name` varchar(255) DEFAULT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `market_type` varchar(255) DEFAULT NULL,
  `display_market_type` varchar(255) DEFAULT NULL,
  `bet_type` varchar(255) DEFAULT NULL,
  `bet_runs` varchar(255) DEFAULT NULL,
  `bet_runs2` varchar(255) NOT NULL DEFAULT '0',
  `bet_odds` varchar(255) DEFAULT NULL,
  `bet_stack` varchar(255) DEFAULT NULL,
  `bet_comm` varchar(255) NOT NULL DEFAULT '0',
  `bet_result` varchar(255) DEFAULT NULL,
  `bet_margin_used` varchar(255) DEFAULT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) DEFAULT NULL,
  `bet_time` datetime DEFAULT NULL,
  `bet_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=settled,1=active,2=cancelled',
  `bet_ip_address` varchar(255) DEFAULT NULL,
  `bet_user_agent` varchar(150) DEFAULT NULL,
  `bet_final_result` varchar(80) DEFAULT NULL,
  `runner_id` varchar(255) NOT NULL DEFAULT '0',
  `runner_name1` varchar(255) DEFAULT NULL,
  `bet_run_result` varchar(255) NOT NULL DEFAULT '0',
  `bet_result_time` datetime DEFAULT NULL,
  `oldGameId` double NOT NULL DEFAULT 0,
  `data` text DEFAULT '\'\'',
  `winner_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toss_end_time`
--

CREATE TABLE `toss_end_time` (
  `toss_end_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tv_details`
--

CREATE TABLE `tv_details` (
  `tv_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL DEFAULT '0',
  `tv_url` text NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `added_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tv_url_master`
--

CREATE TABLE `tv_url_master` (
  `id` int(11) NOT NULL,
  `event_id` text DEFAULT NULL,
  `sport_id` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `score_url` text DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twenty_teenpatti_result`
--

CREATE TABLE `twenty_teenpatti_result` (
  `tt_result_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `result_status` varchar(255) NOT NULL,
  `cards` text NOT NULL,
  `b_cards` text DEFAULT NULL,
  `desc_remakrs` varchar(255) NOT NULL,
  `data` text DEFAULT NULL,
  `result_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twenty_teenpatti_result_new`
--

CREATE TABLE `twenty_teenpatti_result_new` (
  `tt_result_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `result_status` varchar(255) NOT NULL,
  `cards` text NOT NULL,
  `b_cards` text DEFAULT NULL,
  `desc_remakrs` varchar(255) NOT NULL,
  `data` text DEFAULT NULL,
  `result_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twenty_teenpatti_result_old_data`
--

CREATE TABLE `twenty_teenpatti_result_old_data` (
  `tt_result_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `result_status` varchar(255) NOT NULL,
  `cards` text NOT NULL,
  `b_cards` text DEFAULT NULL,
  `desc_remakrs` varchar(255) NOT NULL,
  `data` text DEFAULT NULL,
  `result_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unmatched_bet_details`
--

CREATE TABLE `unmatched_bet_details` (
  `bet_id` int(11) NOT NULL,
  `bet_ip_address` varchar(255) NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `oddsmarketId` varchar(255) NOT NULL,
  `market_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `market_name` varchar(255) NOT NULL,
  `market_type` varchar(255) NOT NULL,
  `bet_type` varchar(255) NOT NULL,
  `bet_runs` varchar(255) NOT NULL,
  `bet_odds` varchar(255) NOT NULL,
  `bet_stack` varchar(255) NOT NULL,
  `bet_result` varchar(255) NOT NULL,
  `bet_margin_used` varchar(255) NOT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) NOT NULL,
  `bet_time` varchar(255) NOT NULL,
  `bet_status` int(11) NOT NULL COMMENT '0=settled,1=active,2=cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unmatched_bet_details2`
--

CREATE TABLE `unmatched_bet_details2` (
  `bet_id` int(11) NOT NULL,
  `bet_ip_address` varchar(255) NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `oddsmarketId` varchar(255) NOT NULL,
  `market_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `market_name` varchar(255) NOT NULL,
  `market_type` varchar(255) NOT NULL,
  `bet_type` varchar(255) NOT NULL,
  `bet_runs` varchar(255) NOT NULL,
  `bet_odds` varchar(255) NOT NULL,
  `bet_stack` varchar(255) NOT NULL,
  `bet_result` varchar(255) NOT NULL,
  `bet_margin_used` varchar(255) NOT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) NOT NULL,
  `bet_time` varchar(255) NOT NULL,
  `bet_status` int(11) NOT NULL COMMENT '0=settled,1=active,2=cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_app_verification_code`
--

CREATE TABLE `user_app_verification_code` (
  `app_code_id` int(11) NOT NULL,
  `app_code_user_id` int(11) NOT NULL,
  `app_code_code` int(11) DEFAULT NULL,
  `app_code_last_updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_login_master`
--

CREATE TABLE `user_login_master` (
  `Id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `UserType` int(11) NOT NULL COMMENT '1=User,2=DL,3=MDL,4=super MDL, 5= Controller,6 = Result Master,7=king admin',
  `Email_ID` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `user_password_salt` varchar(255) NOT NULL,
  `user_password_salt_key` varchar(255) NOT NULL,
  `Password2` varchar(255) NOT NULL,
  `password2_salt` varchar(255) DEFAULT NULL,
  `password2_salt_key` varchar(255) DEFAULT NULL,
  `transaction_password` varchar(255) DEFAULT '',
  `transaction_password_salt` varchar(255) NOT NULL,
  `transaction_password_salt_key` varchar(255) NOT NULL,
  `TransactionPin` int(11) NOT NULL,
  `parentDL` int(11) NOT NULL,
  `parentMDL` int(11) NOT NULL,
  `parentSuperMDL` int(11) NOT NULL,
  `parentKingAdmin` int(11) NOT NULL DEFAULT 0,
  `SecretKey` varchar(50) DEFAULT NULL,
  `first_password_changed` int(11) NOT NULL,
  `api_auth_token` varchar(255) NOT NULL,
  `loginString` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email_ID` varchar(100) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `min_stake` varchar(255) NOT NULL DEFAULT '500',
  `max_stake` varchar(255) NOT NULL DEFAULT '500000',
  `min_fancy_stake` varchar(255) NOT NULL,
  `max_fancy_stake` varchar(255) NOT NULL,
  `min_cricket_stake` varchar(30) NOT NULL,
  `max_cricket_stake` varchar(30) NOT NULL,
  `min_soccer_stake` varchar(30) NOT NULL,
  `max_soccer_stake` varchar(30) NOT NULL,
  `min_tennis_stake` varchar(30) NOT NULL,
  `max_tennis_stake` varchar(30) NOT NULL,
  `min_casino_stake` varchar(30) NOT NULL,
  `max_casino_stake` varchar(30) NOT NULL,
  `minimum_odds` varchar(30) NOT NULL COMMENT 'Lay',
  `maximum_odds` varchar(30) NOT NULL COMMENT 'Back',
  `my_percentage` int(11) NOT NULL,
  `net_exposure_limit` varchar(255) NOT NULL,
  `bet_place_matching` int(11) NOT NULL COMMENT '0=New Rate,1=Un-Matched',
  `button_value` varchar(255) NOT NULL DEFAULT '1000,2000,5000,10000,20000,25000,50000,75000',
  `casino_button_value` varchar(255) NOT NULL DEFAULT '100,200,500,1000,1500,2000',
  `default_stake` varchar(255) NOT NULL,
  `one_bet_default_stake` varchar(255) NOT NULL,
  `match_odds_processing` varchar(255) NOT NULL,
  `fancy_odds_processing` varchar(255) NOT NULL,
  `bet_delete_status` int(11) NOT NULL,
  `Join_Date` date DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `DateTime` datetime DEFAULT NULL,
  `bet_status` tinyint(4) NOT NULL DEFAULT 1,
  `fancy_bet_status` tinyint(4) NOT NULL DEFAULT 1,
  `power` tinyint(4) NOT NULL DEFAULT 0,
  `credit_reference` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `parentDL` int(11) NOT NULL DEFAULT 0,
  `parentMDL` int(11) NOT NULL DEFAULT 0,
  `parentSuperMDL` int(11) NOT NULL DEFAULT 0,
  `parentKingAdmin` int(11) NOT NULL DEFAULT 0,
  `cricket_access` tinyint(4) NOT NULL DEFAULT 1,
  `soccer_access` tinyint(4) NOT NULL DEFAULT 1,
  `tennis_access` tinyint(4) NOT NULL DEFAULT 1,
  `video_access` tinyint(4) NOT NULL DEFAULT 1,
  `total_balace` double NOT NULL DEFAULT 0,
  `total_deposit_withdraw` double NOT NULL DEFAULT 0,
  `total_profit_loss` double NOT NULL DEFAULT 0,
  `sync_account_id` int(11) NOT NULL DEFAULT 0,
  `sync_account_datetime` datetime NOT NULL,
  `sync_last_account_id` int(11) NOT NULL DEFAULT 0,
  `bet_email_notify` int(11) NOT NULL DEFAULT 0,
  `user_verification_type` varchar(255) DEFAULT NULL,
  `user_verification_status` enum('ENABLED','DISABLED') NOT NULL DEFAULT 'DISABLED',
  `user_device_id` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_panel_verification_code`
--

CREATE TABLE `user_panel_verification_code` (
  `pcode_id` int(11) NOT NULL,
  `pcode_user_id` int(11) NOT NULL,
  `pcode_verification_code` text DEFAULT NULL,
  `pcode_last_updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_transaction_change_history`
--

CREATE TABLE `user_transaction_change_history` (
  `id` int(11) NOT NULL,
  `change_by` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_data` text DEFAULT NULL,
  `new_data` text DEFAULT NULL,
  `transaction_type` text DEFAULT NULL,
  `transaction_password` text DEFAULT NULL,
  `ip_address` text DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wrong_bets`
--

CREATE TABLE `wrong_bets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `bet_id` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `page_name` text DEFAULT NULL,
  `ip_address` text DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `added_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wrong_bet_details`
--

CREATE TABLE `wrong_bet_details` (
  `bet_id` int(11) NOT NULL,
  `original_bet_id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `market_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `market_name` varchar(255) NOT NULL,
  `market_type` varchar(255) NOT NULL,
  `bet_type` varchar(255) NOT NULL,
  `bet_runs` varchar(255) NOT NULL,
  `bet_odds` varchar(255) NOT NULL,
  `bet_stack` varchar(255) NOT NULL,
  `bet_result` varchar(255) NOT NULL,
  `bet_margin_used` varchar(255) NOT NULL COMMENT 'bet amount',
  `bet_win_amount` varchar(255) NOT NULL,
  `bet_time` varchar(255) NOT NULL,
  `bet_status` int(11) NOT NULL COMMENT '0=settled,1=active,2=cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `bet_id` (`bet_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `entry_type` (`entry_type`),
  ADD KEY `account_date_time` (`account_date_time`),
  ADD KEY `user_id_2` (`user_id`,`game_type`,`amount`);

--
-- Indexes for table `accounts_backup`
--
ALTER TABLE `accounts_backup`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `bet_id` (`bet_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `entry_type` (`entry_type`),
  ADD KEY `account_date_time` (`account_date_time`);

--
-- Indexes for table `accounts_temp`
--
ALTER TABLE `accounts_temp`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `bet_id` (`bet_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `entry_type` (`entry_type`),
  ADD KEY `account_date_time` (`account_date_time`);

--
-- Indexes for table `accounts_temp_test`
--
ALTER TABLE `accounts_temp_test`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `bet_id` (`bet_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `entry_type` (`entry_type`),
  ADD KEY `account_date_time` (`account_date_time`);

--
-- Indexes for table `account_old_entry`
--
ALTER TABLE `account_old_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `admin_preference`
--
ALTER TABLE `admin_preference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_block_details`
--
ALTER TABLE `bet_block_details`
  ADD PRIMARY KEY (`bet_block_id`),
  ADD UNIQUE KEY `event_id` (`event_id`,`user_id`,`block_type`,`added_by`);

--
-- Indexes for table `bet_cancelled_log`
--
ALTER TABLE `bet_cancelled_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `bet_delay_master`
--
ALTER TABLE `bet_delay_master`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `bet_delay_master_log`
--
ALTER TABLE `bet_delay_master_log`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `bet_delete_otp`
--
ALTER TABLE `bet_delete_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_details`
--
ALTER TABLE `bet_details`
  ADD PRIMARY KEY (`bet_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`bet_time`),
  ADD KEY `event_type` (`event_type`,`event_id`,`oddsmarketId`,`user_id`,`event_name`),
  ADD KEY `idx_bet_details_event_market_status` (`event_id`,`market_type`,`bet_status`),
  ADD KEY `idx_bet_time` (`bet_time`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Indexes for table `bet_details2`
--
ALTER TABLE `bet_details2`
  ADD KEY `idx_event` (`event_id`),
  ADD KEY `idx_user` (`user_id`);

--
-- Indexes for table `bet_details_api_data`
--
ALTER TABLE `bet_details_api_data`
  ADD PRIMARY KEY (`bet_details_id`);

--
-- Indexes for table `bet_details_api_data_old_data`
--
ALTER TABLE `bet_details_api_data_old_data`
  ADD PRIMARY KEY (`bet_details_id`);

--
-- Indexes for table `bet_details_deleted`
--
ALTER TABLE `bet_details_deleted`
  ADD PRIMARY KEY (`bet_deleted_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`bet_time`);

--
-- Indexes for table `bet_details_old_data`
--
ALTER TABLE `bet_details_old_data`
  ADD PRIMARY KEY (`bet_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`bet_time`);

--
-- Indexes for table `bet_market_suspend_master`
--
ALTER TABLE `bet_market_suspend_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_success_log`
--
ALTER TABLE `bet_success_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `bet_success_log_old_data`
--
ALTER TABLE `bet_success_log_old_data`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `bet_success_log_test`
--
ALTER TABLE `bet_success_log_test`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `bet_teen_details`
--
ALTER TABLE `bet_teen_details`
  ADD PRIMARY KEY (`bet_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`bet_time`,`randomkey`) USING BTREE,
  ADD KEY `event_type` (`event_type`,`event_id`,`bet_status`),
  ADD KEY `idx_teen_bet_time` (`bet_time`),
  ADD KEY `idx_teen_user_id` (`user_id`);

--
-- Indexes for table `bet_teen_details_ak`
--
ALTER TABLE `bet_teen_details_ak`
  ADD PRIMARY KEY (`bet_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`bet_time`);

--
-- Indexes for table `bet_teen_details_deleted`
--
ALTER TABLE `bet_teen_details_deleted`
  ADD PRIMARY KEY (`bet_deleted_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`bet_time`);

--
-- Indexes for table `bet_teen_details_old_data`
--
ALTER TABLE `bet_teen_details_old_data`
  ADD PRIMARY KEY (`bet_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`bet_time`,`randomkey`) USING BTREE;

--
-- Indexes for table `bet_teen_details_old_dta`
--
ALTER TABLE `bet_teen_details_old_dta`
  ADD PRIMARY KEY (`bet_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`bet_time`),
  ADD KEY `event_type` (`event_type`,`event_id`,`bet_status`),
  ADD KEY `idx_teen_bet_time` (`bet_time`),
  ADD KEY `idx_teen_user_id` (`user_id`);

--
-- Indexes for table `block_bet_id`
--
ALTER TABLE `block_bet_id`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indexes for table `block_event`
--
ALTER TABLE `block_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_event_id`
--
ALTER TABLE `block_event_id`
  ADD PRIMARY KEY (`be_id`);

--
-- Indexes for table `block_market_id`
--
ALTER TABLE `block_market_id`
  ADD PRIMARY KEY (`bm_id`);

--
-- Indexes for table `block_sport`
--
ALTER TABLE `block_sport`
  ADD PRIMARY KEY (`bs_id`);

--
-- Indexes for table `casino_cricket_20_20_rules`
--
ALTER TABLE `casino_cricket_20_20_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casino_list`
--
ALTER TABLE `casino_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casino_maintanance_list`
--
ALTER TABLE `casino_maintanance_list`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `casino_under_maintanance`
--
ALTER TABLE `casino_under_maintanance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_master`
--
ALTER TABLE `commission_master`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `continues_bet_details`
--
ALTER TABLE `continues_bet_details`
  ADD PRIMARY KEY (`bet_id`);

--
-- Indexes for table `cookie_details`
--
ALTER TABLE `cookie_details`
  ADD PRIMARY KEY (`cookie_id`);

--
-- Indexes for table `cron_auto_casino`
--
ALTER TABLE `cron_auto_casino`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_master`
--
ALTER TABLE `employee_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_casino_market_id`
--
ALTER TABLE `event_casino_market_id`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `event_casino_market_id2`
--
ALTER TABLE `event_casino_market_id2`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `event_delay_master`
--
ALTER TABLE `event_delay_master`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `event_market_id`
--
ALTER TABLE `event_market_id`
  ADD PRIMARY KEY (`em_id`),
  ADD UNIQUE KEY `event_id` (`event_id`,`market_id`,`market_type`);

--
-- Indexes for table `event_market_limit`
--
ALTER TABLE `event_market_limit`
  ADD PRIMARY KEY (`limit_id`);

--
-- Indexes for table `event_market_remarks`
--
ALTER TABLE `event_market_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_min_max`
--
ALTER TABLE `event_min_max`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_name_code`
--
ALTER TABLE `event_name_code`
  ADD PRIMARY KEY (`event_name_code_id`);

--
-- Indexes for table `exposure_details`
--
ALTER TABLE `exposure_details`
  ADD PRIMARY KEY (`exposure_id`);

--
-- Indexes for table `hdmi_tv_master`
--
ALTER TABLE `hdmi_tv_master`
  ADD PRIMARY KEY (`tv_id`);

--
-- Indexes for table `home_custom_event_list`
--
ALTER TABLE `home_custom_event_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_image`
--
ALTER TABLE `home_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_image2`
--
ALTER TABLE `home_image2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kbc_teen_bet`
--
ALTER TABLE `kbc_teen_bet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_cookie`
--
ALTER TABLE `login_cookie`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `login_ip_address`
--
ALTER TABLE `login_ip_address`
  ADD PRIMARY KEY (`login_ip_id`);

--
-- Indexes for table `login_ip_address_old_data`
--
ALTER TABLE `login_ip_address_old_data`
  ADD PRIMARY KEY (`login_ip_id`);

--
-- Indexes for table `login_sport_cookie`
--
ALTER TABLE `login_sport_cookie`
  ADD PRIMARY KEY (`login_sport_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_failed_bet`
--
ALTER TABLE `mail_failed_bet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_event_details`
--
ALTER TABLE `manual_event_details`
  ADD PRIMARY KEY (`manual_event_id`);

--
-- Indexes for table `manual_event_market_details`
--
ALTER TABLE `manual_event_market_details`
  ADD PRIMARY KEY (`manual_market_id`);

--
-- Indexes for table `manual_event_selectors_details`
--
ALTER TABLE `manual_event_selectors_details`
  ADD PRIMARY KEY (`manual_selectors_id`);

--
-- Indexes for table `marquee_master`
--
ALTER TABLE `marquee_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marquee_message`
--
ALTER TABLE `marquee_message`
  ADD PRIMARY KEY (`marquee_id`);

--
-- Indexes for table `meter_market_mapping`
--
ALTER TABLE `meter_market_mapping`
  ADD PRIMARY KEY (`meter_mapping_id`);

--
-- Indexes for table `privileges_master`
--
ALTER TABLE `privileges_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_request`
--
ALTER TABLE `register_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `rejection_log`
--
ALTER TABLE `rejection_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `rejection_log_old_data`
--
ALTER TABLE `rejection_log_old_data`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_block_details`
--
ALTER TABLE `result_block_details`
  ADD PRIMARY KEY (`result_block_id`);

--
-- Indexes for table `result_match_odds`
--
ALTER TABLE `result_match_odds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_summery_logs`
--
ALTER TABLE `result_summery_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roulette_bet_details`
--
ALTER TABLE `roulette_bet_details`
  ADD PRIMARY KEY (`roulette_bet_id`);

--
-- Indexes for table `roulette_game_details`
--
ALTER TABLE `roulette_game_details`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `roulette_profit_details`
--
ALTER TABLE `roulette_profit_details`
  ADD PRIMARY KEY (`roulette_profit_id`);

--
-- Indexes for table `settlement`
--
ALTER TABLE `settlement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_under_maintenance`
--
ALTER TABLE `site_under_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sport_list`
--
ALTER TABLE `sport_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telegram_webook_response`
--
ALTER TABLE `telegram_webook_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toss_end_time`
--
ALTER TABLE `toss_end_time`
  ADD PRIMARY KEY (`toss_end_id`);

--
-- Indexes for table `tv_details`
--
ALTER TABLE `tv_details`
  ADD PRIMARY KEY (`tv_id`);

--
-- Indexes for table `tv_url_master`
--
ALTER TABLE `tv_url_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `twenty_teenpatti_result`
--
ALTER TABLE `twenty_teenpatti_result`
  ADD PRIMARY KEY (`tt_result_id`),
  ADD UNIQUE KEY `event_id` (`event_id`,`game_type`);

--
-- Indexes for table `twenty_teenpatti_result_new`
--
ALTER TABLE `twenty_teenpatti_result_new`
  ADD PRIMARY KEY (`tt_result_id`);

--
-- Indexes for table `twenty_teenpatti_result_old_data`
--
ALTER TABLE `twenty_teenpatti_result_old_data`
  ADD PRIMARY KEY (`tt_result_id`);

--
-- Indexes for table `unmatched_bet_details`
--
ALTER TABLE `unmatched_bet_details`
  ADD PRIMARY KEY (`bet_id`);

--
-- Indexes for table `unmatched_bet_details2`
--
ALTER TABLE `unmatched_bet_details2`
  ADD PRIMARY KEY (`bet_id`);

--
-- Indexes for table `user_app_verification_code`
--
ALTER TABLE `user_app_verification_code`
  ADD PRIMARY KEY (`app_code_id`);

--
-- Indexes for table `user_login_master`
--
ALTER TABLE `user_login_master`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `idx_email` (`Email_ID`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_panel_verification_code`
--
ALTER TABLE `user_panel_verification_code`
  ADD PRIMARY KEY (`pcode_id`);

--
-- Indexes for table `user_transaction_change_history`
--
ALTER TABLE `user_transaction_change_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wrong_bets`
--
ALTER TABLE `wrong_bets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wrong_bet_details`
--
ALTER TABLE `wrong_bet_details`
  ADD PRIMARY KEY (`bet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts_backup`
--
ALTER TABLE `accounts_backup`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts_temp`
--
ALTER TABLE `accounts_temp`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts_temp_test`
--
ALTER TABLE `accounts_temp_test`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_old_entry`
--
ALTER TABLE `account_old_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_preference`
--
ALTER TABLE `admin_preference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_block_details`
--
ALTER TABLE `bet_block_details`
  MODIFY `bet_block_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_cancelled_log`
--
ALTER TABLE `bet_cancelled_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_delay_master`
--
ALTER TABLE `bet_delay_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_delay_master_log`
--
ALTER TABLE `bet_delay_master_log`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_delete_otp`
--
ALTER TABLE `bet_delete_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_details`
--
ALTER TABLE `bet_details`
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_details_api_data`
--
ALTER TABLE `bet_details_api_data`
  MODIFY `bet_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_details_api_data_old_data`
--
ALTER TABLE `bet_details_api_data_old_data`
  MODIFY `bet_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_details_deleted`
--
ALTER TABLE `bet_details_deleted`
  MODIFY `bet_deleted_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_details_old_data`
--
ALTER TABLE `bet_details_old_data`
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_market_suspend_master`
--
ALTER TABLE `bet_market_suspend_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_success_log`
--
ALTER TABLE `bet_success_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_success_log_old_data`
--
ALTER TABLE `bet_success_log_old_data`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_success_log_test`
--
ALTER TABLE `bet_success_log_test`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_teen_details`
--
ALTER TABLE `bet_teen_details`
  MODIFY `bet_id` double NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_teen_details_ak`
--
ALTER TABLE `bet_teen_details_ak`
  MODIFY `bet_id` double NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_teen_details_deleted`
--
ALTER TABLE `bet_teen_details_deleted`
  MODIFY `bet_deleted_id` double NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_teen_details_old_data`
--
ALTER TABLE `bet_teen_details_old_data`
  MODIFY `bet_id` double NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bet_teen_details_old_dta`
--
ALTER TABLE `bet_teen_details_old_dta`
  MODIFY `bet_id` double NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block_bet_id`
--
ALTER TABLE `block_bet_id`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block_event`
--
ALTER TABLE `block_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block_event_id`
--
ALTER TABLE `block_event_id`
  MODIFY `be_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block_market_id`
--
ALTER TABLE `block_market_id`
  MODIFY `bm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block_sport`
--
ALTER TABLE `block_sport`
  MODIFY `bs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `casino_cricket_20_20_rules`
--
ALTER TABLE `casino_cricket_20_20_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `casino_list`
--
ALTER TABLE `casino_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `casino_maintanance_list`
--
ALTER TABLE `casino_maintanance_list`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `casino_under_maintanance`
--
ALTER TABLE `casino_under_maintanance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commission_master`
--
ALTER TABLE `commission_master`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `continues_bet_details`
--
ALTER TABLE `continues_bet_details`
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cookie_details`
--
ALTER TABLE `cookie_details`
  MODIFY `cookie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cron_auto_casino`
--
ALTER TABLE `cron_auto_casino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_master`
--
ALTER TABLE `employee_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_casino_market_id`
--
ALTER TABLE `event_casino_market_id`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_casino_market_id2`
--
ALTER TABLE `event_casino_market_id2`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_delay_master`
--
ALTER TABLE `event_delay_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_market_id`
--
ALTER TABLE `event_market_id`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_market_limit`
--
ALTER TABLE `event_market_limit`
  MODIFY `limit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_market_remarks`
--
ALTER TABLE `event_market_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_min_max`
--
ALTER TABLE `event_min_max`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_name_code`
--
ALTER TABLE `event_name_code`
  MODIFY `event_name_code_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exposure_details`
--
ALTER TABLE `exposure_details`
  MODIFY `exposure_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hdmi_tv_master`
--
ALTER TABLE `hdmi_tv_master`
  MODIFY `tv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_custom_event_list`
--
ALTER TABLE `home_custom_event_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_image`
--
ALTER TABLE `home_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_image2`
--
ALTER TABLE `home_image2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kbc_teen_bet`
--
ALTER TABLE `kbc_teen_bet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_cookie`
--
ALTER TABLE `login_cookie`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_ip_address`
--
ALTER TABLE `login_ip_address`
  MODIFY `login_ip_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_ip_address_old_data`
--
ALTER TABLE `login_ip_address_old_data`
  MODIFY `login_ip_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_sport_cookie`
--
ALTER TABLE `login_sport_cookie`
  MODIFY `login_sport_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_failed_bet`
--
ALTER TABLE `mail_failed_bet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manual_event_details`
--
ALTER TABLE `manual_event_details`
  MODIFY `manual_event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manual_event_market_details`
--
ALTER TABLE `manual_event_market_details`
  MODIFY `manual_market_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manual_event_selectors_details`
--
ALTER TABLE `manual_event_selectors_details`
  MODIFY `manual_selectors_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marquee_master`
--
ALTER TABLE `marquee_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marquee_message`
--
ALTER TABLE `marquee_message`
  MODIFY `marquee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meter_market_mapping`
--
ALTER TABLE `meter_market_mapping`
  MODIFY `meter_mapping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privileges_master`
--
ALTER TABLE `privileges_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register_request`
--
ALTER TABLE `register_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_log`
--
ALTER TABLE `rejection_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_log_old_data`
--
ALTER TABLE `rejection_log_old_data`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result_block_details`
--
ALTER TABLE `result_block_details`
  MODIFY `result_block_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result_match_odds`
--
ALTER TABLE `result_match_odds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result_summery_logs`
--
ALTER TABLE `result_summery_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roulette_bet_details`
--
ALTER TABLE `roulette_bet_details`
  MODIFY `roulette_bet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roulette_game_details`
--
ALTER TABLE `roulette_game_details`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roulette_profit_details`
--
ALTER TABLE `roulette_profit_details`
  MODIFY `roulette_profit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settlement`
--
ALTER TABLE `settlement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_under_maintenance`
--
ALTER TABLE `site_under_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sport_list`
--
ALTER TABLE `sport_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telegram_webook_response`
--
ALTER TABLE `telegram_webook_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toss_end_time`
--
ALTER TABLE `toss_end_time`
  MODIFY `toss_end_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_details`
--
ALTER TABLE `tv_details`
  MODIFY `tv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_url_master`
--
ALTER TABLE `tv_url_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twenty_teenpatti_result`
--
ALTER TABLE `twenty_teenpatti_result`
  MODIFY `tt_result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twenty_teenpatti_result_new`
--
ALTER TABLE `twenty_teenpatti_result_new`
  MODIFY `tt_result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twenty_teenpatti_result_old_data`
--
ALTER TABLE `twenty_teenpatti_result_old_data`
  MODIFY `tt_result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unmatched_bet_details`
--
ALTER TABLE `unmatched_bet_details`
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unmatched_bet_details2`
--
ALTER TABLE `unmatched_bet_details2`
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_app_verification_code`
--
ALTER TABLE `user_app_verification_code`
  MODIFY `app_code_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login_master`
--
ALTER TABLE `user_login_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_panel_verification_code`
--
ALTER TABLE `user_panel_verification_code`
  MODIFY `pcode_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_transaction_change_history`
--
ALTER TABLE `user_transaction_change_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wrong_bets`
--
ALTER TABLE `wrong_bets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wrong_bet_details`
--
ALTER TABLE `wrong_bet_details`
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
