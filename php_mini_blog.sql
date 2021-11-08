-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 11:51 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_mini_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(100) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `time` datetime NOT NULL,
  `ctg_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `text`, `time`, `ctg_id`) VALUES
(1, 'The AI magically removes moving objects from videos.', '/template/images/img_1.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae sed consectetur adipisci sapiente explicabo quam porro, delectus voluptate autem tempore. Cumque nesciunt architecto consectetur? Dignissimos quisquam nulla blanditiis, eveniet ullam suscipit iste at veritatis excepturi, animi cum molestias nihil aut. Atque autem neque, praesentium ea omnis, rem blanditiis deleniti molestiae saepe nihil magni nam fugit fuga, voluptatem totam error accusantium!', '2021-10-31 12:11:11', 5),
(2, 'The AI magically removes moving objects from videos.', '/template/images/img_2.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae sed consectetur adipisci sapiente explicabo quam porro, delectus voluptate autem tempore. Cumque nesciunt architecto consectetur? Dignissimos quisquam nulla blanditiis, eveniet ullam suscipit iste at veritatis excepturi, animi cum molestias nihil aut. Atque autem neque, praesentium ea omnis, rem blanditiis deleniti molestiae saepe nihil magni nam fugit fuga, voluptatem totam error accusantium!', '2021-10-31 18:11:11', 4),
(3, 'The AI magically removes moving objects from videos.', '/template/images/img_3.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae sed consectetur adipisci sapiente explicabo quam porro, delectus voluptate autem tempore. Cumque nesciunt architecto consectetur? Dignissimos quisquam nulla blanditiis, eveniet ullam suscipit iste at veritatis excepturi, animi cum molestias nihil aut. Atque autem neque, praesentium ea omnis, rem blanditiis deleniti molestiae saepe nihil magni nam fugit fuga, voluptatem totam error accusantium!', '2021-10-31 01:11:11', 3),
(4, 'The AI magically removes moving objects from videos.', '/template/images/img_4.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae sed consectetur adipisci sapiente explicabo quam porro, delectus voluptate autem tempore. Cumque nesciunt architecto consectetur? Dignissimos quisquam nulla blanditiis, eveniet ullam suscipit iste at veritatis excepturi, animi cum molestias nihil aut. Atque autem neque, praesentium ea omnis, rem blanditiis deleniti molestiae saepe nihil magni nam fugit fuga, voluptatem totam error accusantium!', '2021-10-31 18:11:11', 3),
(5, 'The AI magically removes moving objects from videos.', '/template/images/img_v_1.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae sed consectetur adipisci sapiente explicabo quam porro, delectus voluptate autem tempore. Cumque nesciunt architecto consectetur? Dignissimos quisquam nulla blanditiis, eveniet ullam suscipit iste at veritatis excepturi, animi cum molestias nihil aut. Atque autem neque, praesentium ea omnis, rem blanditiis deleniti molestiae saepe nihil magni nam fugit fuga, voluptatem totam error accusantium!', '2021-10-31 08:11:11', 1),
(6, 'The AI magically removes moving objects from videos.', '/template/images/img_v_2.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae sed consectetur adipisci sapiente explicabo quam porro, delectus voluptate autem tempore. Cumque nesciunt architecto consectetur? Dignissimos quisquam nulla blanditiis, eveniet ullam suscipit iste at veritatis excepturi, animi cum molestias nihil aut. Atque autem neque, praesentium ea omnis, rem blanditiis deleniti molestiae saepe nihil magni nam fugit fuga, voluptatem totam error accusantium!', '2021-10-31 08:11:11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(5, 'Adventure'),
(4, 'Business'),
(1, 'Food'),
(3, 'Lifestyle'),
(2, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(1024) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `time`, `user_id`, `post_id`) VALUES
(29, 'Ajoyib ekan menga rosa yoqdi', '2021-11-04 22:50:34', 3, 3),
(30, 'menga ham yoq. yanda koproq chiqaringlar!', '2021-11-04 22:51:38', 9, 4),
(31, 'ajoyib', '2021-11-05 10:15:15', 3, 3),
(33, '5632', '2021-11-05 10:30:01', 3, 3),
(34, 's', '2021-11-05 10:30:25', 3, 3),
(36, '', '2021-11-05 10:31:07', 3, 3),
(37, '213', '2021-11-05 10:31:17', 3, 3),
(38, '323', '2021-11-05 10:31:32', 3, 3),
(39, 'kjhkjh', '2021-11-05 10:33:19', 3, 3),
(40, 'asd', '2021-11-05 10:33:45', 3, 3),
(46, 'dasdsa', '2021-11-05 11:08:08', 3, 4),
(53, 'nima gap bollar', '2021-11-05 15:14:01', 9, 4),
(62, 'asd', '2021-11-05 16:01:23', 3, 4),
(66, 'zor\n', '2021-11-05 16:13:22', 3, 6),
(69, 'Klass', '2021-11-05 17:56:02', 10, 3),
(70, 's', '2021-11-05 18:00:10', 10, 4),
(71, 'asd', '2021-11-05 18:32:49', 10, 3),
(76, 'hello there', '2021-11-07 10:58:53', 3, 6),
(77, '            Nima gap!\r\n        !!!!!!!', '2021-11-07 10:59:02', 3, 6),
(81, '', '2021-11-07 18:38:09', 3, 4),
(83, '159753', '2021-11-07 18:41:38', 3, 4),
(84, '561651', '2021-11-07 18:41:43', 3, 4),
(85, '2', '2021-11-07 18:42:28', 3, 4),
(86, 'uuu', '2021-11-07 18:42:49', 3, 4),
(87, '123', '2021-11-07 18:43:47', 3, 4),
(89, '9999999999999999999999999', '2021-11-07 18:47:40', 3, 4),
(90, 'sadasd', '2021-11-07 22:16:48', 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(64) DEFAULT NULL,
  `text` varchar(1024) DEFAULT NULL,
  `main_text` longtext NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `is_recent` int(11) NOT NULL,
  `is_popular` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `tag_name` varchar(255) DEFAULT NULL,
  `ctg_name` varchar(128) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `main_text`, `image`, `is_recent`, `is_popular`, `created_at`, `tag_name`, `ctg_name`, `user_id`) VALUES
(3, 'Reeling Democrats see threat to House and Senate control as Repu', 'Republican gubernatorial candidate Glenn Youngkin heads to shoot baskets as he makes a stop at Rocky Run Middle School on Tuesday November 02, 2021, in Chantilly, VA. The race for governor is pivotal in VirginiaÃ•s election. (Matt McClain/The Washington Post)', 'PHA+RGVtb2NyYXRzIHJlZWxpbmcgZnJvbSB0aGUgcGFydHkmcnNxdW87cyBzaG93aW5nIG9uIFR1ZXNkYXkgbmlnaHQgd2VyZSBzaGFycGx5IGNyaXRpY2FsIG9mIGl0cyBkaXJlY3Rpb24gYW5kIGFnZW5kYSAmbWRhc2g7IGFscmVhZHkgdGhlIHN1YmplY3Qgb2YgbW9udGhzIG9mIGluZmlnaHRpbmcgb24gQ2FwaXRvbCBIaWxsICZtZGFzaDsgY29uY2x1ZGluZyBpdCB0aHJlYXRlbnMgdG8gZGV2YXN0YXRlIHRoZWlyIGVmZm9ydHMgdG8gaG9sZCBvbiB0byB0aGUgSG91c2UgYW5kIFNlbmF0ZSBuZXh0IHllYXIgbXVjaCBhcyBpdCBkcmFnZ2VkIGRvd24gdGhpcyB5ZWFyJnJzcXVvO3MgY2FuZGlkYXRlcy48L3A+DQoNCjxwPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cud2FzaGluZ3RvbnBvc3QuY29tL3dwLWFwcHMvaW1ycy5waHA/c3JjPWh0dHBzOi8vYXJjLWFuZ2xlcmZpc2gtd2FzaHBvc3QtcHJvZC13YXNocG9zdC5zMy5hbWF6b25hd3MuY29tL3B1YmxpYy9LR1VJUlBSNEFNSTZaUExQM0kzVzZSWlFKWS5qcGcmYW1wO3c9NjkxIiBzdHlsZT0iZmxvYXQ6bGVmdDsgaGVpZ2h0OjQ2MXB4OyBtYXJnaW46MTBweCAzMHB4OyB3aWR0aDo2OTFweCIgLz48L3A+DQoNCjxoMj5JbiBWaXJnaW5pYSwgYSBzdGF0ZSB0aGF0IGhhcyBiZWNvbWUgcmVsaWFibHkgYmx1ZSBpbiByZWNlbnQgeWVhcnMsIFJlcHVibGljYW4gR2xlbm4gWW91bmdraW4gZGVmZWF0ZWQgRGVtb2NyYXQgVGVycnkgTWNBdWxpZmZlLCBhY2NvcmRpbmcgdG8gYW4gQXNzb2NpYXRlZCBQcmVzcyBwcm9qZWN0aW9uOyBpbiBOZXcgSmVyc2V5LCBEZW1vY3JhdGljIEdvdi4gUGhpbCBNdXJwaHkgd2FzIHN0cnVnZ2xpbmcgZm9yIGhpcyBzZWNvbmQgdGVybSAmbWRhc2g7IHJlc3VsdHMgdGhhdCBzdWdnZXN0ZWQgdGhlIHNjb3BlIG9mIERlbW9jcmF0aWMgZGlmZmljdWx0eSB3YXMgbmF0aW9uYWwuIFRoZXJlIHdlcmUgYWxzbyByZXB1ZGlhdGlvbnMgb2YgbGliZXJhbCBlZmZvcnRzIGluIHZhcmllZCByYWNlcywgaW5jbHVkaW5nIGluIE1pbm5lYXBvbGlzLCB3aGVyZSB2b3RlcnMgc3B1cm5lZCBhbiBhdHRlbXB0IHRvIHJlcGxhY2UgdGhlIHBvbGljZSBkZXBhcnRtZW50IHdpdGggYSBjb21wcmVoZW5zaXZlIHNhZmV0eSBhZ2VuY3kuPC9oMj4NCg0KPGgxPlRoZSBjaXJjdW1zdGFuY2VzIGluIHRoZSB0d28gZ292ZXJub3ImcnNxdW87cyByYWNlcyBhbGwgYnV0IGNvbmZpcm1lZCB0aGUgY29sbGFwc2Ugb2YgdGhlIGNvYWxpdGlvbiB0aGF0IHByb3BlbGxlZCBEZW1vY3JhdHMgdG8gcG93ZXIgZHVyaW5nIHRoZSBEb25hbGQgVHJ1bXAgYWRtaW5pc3RyYXRpb24gYW5kIEpvZSBCaWRlbiB0byB0aGUgcHJlc2lkZW5jeSBpbiAyMDIwLiBJbiB0aGUgZWxlY3Rpb24mcnNxdW87cyB3YWtlLCB0aGVyZSB3ZXJlIGZyZXNoIGRvdWJ0cyBpbiB0aGUgcGFydHkgYWJvdXQgQmlkZW4mcnNxdW87cyBhYmlsaXR5IHRvIHB1c2ggaGlzIGRvbWVzdGljIGFnZW5kYSBhY3Jvc3MgdGhlIGZpbmlzaCBsaW5lLCBhbmQgdG8gcmVwZWwgdGhlIG5ldyBhdHRhY2tzIFJlcHVibGljYW5zIGhhdmUgb3BlbmVkIG9uIGN1bHR1cmUgZnJvbnRzLCBlc3BlY2lhbGx5IG92ZXIgc2Nob29scy4gQSBuZXcgcm91bmQgb2YgdXBoZWF2YWwgb3ZlciB0aGUgcGFydHkmcnNxdW87cyBwcmlvcml0aWVzIGFuZCBzdHJhdGVnaWVzIGFwcGVhcmVkIGltbWluZW50LjwvaDE+DQo=', 'no-post.png', 1, 1, '2021-11-04 14:43:28', 'business', 'Business', 3),
(4, 'WEAPONIZING NETWORKS', 'Texas has the second largest GDP of any state in the union. It is home to some of Americaâ€™s most critical warfighting capabilities and is the only state with a semi-independent electrical grid.[i] These facts alone make Texas critical to U.S. national security. These same facts make the Lone Star State a prime target for Americaâ€™s adversaries â€“ especially a less recognized, yet remarkably dangerous conglomeration of state and non-state actors in Latin America, known as the Bolivarian threat network.', 'PHA+TGVkIGJ5IEN1YmEgYW5kIFZlbmV6dWVsYSwgdGhlIEJvbGl2YXJpYW4gdGhyZWF0IG5ldHdvcmsgdW5pdGVzIGEgbGVuZ3RoeSBsaXN0IG9mIGNyaW1pbmFsIGdyb3Vwcywgc29jaWFsaXN0IG5vbi1nb3Zlcm5tZW50YWwgb3JnYW5pemF0aW9ucyAoTkdPKSwgZGlnaXRhbCBhY3RpdmlzdHMsIG1lZGlhIGVudGl0aWVzLCBwb2xpdGljYWwgcGFydGllcywgdGVycm9yaXN0IG9yZ2FuaXphdGlvbnMsIGFuZCByb2d1ZSByZWdpbWVzIHRvIHdhZ2UgYXN5bW1ldHJpYyB3YXIgYWdhaW5zdCB0aGUgVW5pdGVkIFN0YXRlcy4gQXN5bW1ldHJpYyB3YXJmYXJlIGlzIGtub3duIGNvbmNlcHR1YWxseSBhcyB0aGUgdXNlIG9mIG5vbi1zdGF0ZSBncm91cHMgZm9yIHN1cnByaXNlIGFuZCBzdWJ0ZXJmdWdlIHRvIGFjaGlldmUgcGFyaXR5IGFnYWluc3Qgc3VwZXJpb3Igb3Bwb25lbnRzLiBUaGUgQm9saXZhcmlhbiB0aHJlYXQgbmV0d29yayByZWxpZXMgb24gbW9yZSB0aGFuIGp1c3Qgbm9uLXN0YXRlIGdyb3VwcywgdGhvdWdoLiBJdCBhbHNvIGVuam95cyB0aGUgc3VwcG9ydCBvZiBBbWVyaWNhJnJzcXVvO3MgbmVhci1wZWVyIGFkdmVyc2FyaWVzIGluIFJ1c3NpYSBhbmQgQ2hpbmEsIGFuZCBmcm9tIHRoZSB3b3JsZCZyc3F1bztzIGxlYWRpbmcgc3RhdGUgc3BvbnNvciBvZiB0ZXJyb3IsIHRoZSBJc2xhbWljIFJlcHVibGljIG9mIElyYW4uPGEgaHJlZj0iaHR0cHM6Ly93d3cuc2VjdXJlZnJlZXNvY2lldHkub3JnL3Jlc2VhcmNoL3dlYXBvbml6aW5nLW5ldHdvcmtzLXBhcnQtb25lLXZlbmV6dWVsYXMtYXN5bW1ldHJpYy1hdHRhY2stb24tdGV4YXMvP2djbGlkPUNqd0tDQWp3aVk2TUJoQnFFaXdBUkZTQ1BqRmZxdXpTbDFMRzBXam05YzlFSjJ5cU1lUlh4VlEtT2NYdVE5VmdEaGdsMnRrSnZLSjVIQm9DbkVVUUF2RF9Cd0UjX2VkbjIiPltpaV08L2E+PC9wPg0KDQo8cD48ZW0+PHM+VGhlIEFMQkEgc3Vydml2ZXMgdGhyb3VnaCB0aGUgQm9saXZhcmlhbiB0aHJlYXQgbmV0d29yayBhbmQgVGV4YXMmcnNxdW87IGxvY2F0aW9uIGFuZCByZXNvdXJjZXMgbWFrZSBpdCBhIGNoaWVmIHRhcmdldCBmb3IgdGhpcyBMYXRpbiBBbWVyaWNhbiBhZHZlcnNhcnkuIFRoZSBCb2xpdmFyaWFuIHRocmVhdCBuZXR3b3JrLCBhcyB0aGUgbmFtZSBzdWdnZXN0cywgcmVsaWVzIGhlYXZpbHkgb24gY292ZXJ0IGFuZCBvdmVydCBuZXR3b3JrcyB0aGF0IHJ1biB0aHJvdWdoIFRleGFzLiBXaGV0aGVyIGl0cyBzdHJhdGVneSB0byB1bmRlcm1pbmUgVS5TLiBwb3dlciBpbiB0aGUgcmVnaW9uIGFuZCB3ZWFrZW4gdGhlIHNlY3VyaXR5IG9mIHRoZSBob21lbGFuZCBpcyBlZmZlY3RpdmUgaGluZ2VzLCBpbiBwYXJ0LCBvbiBpdHMgb3BlcmF0aW9ucyBpbiB0aGUgTG9uZSBTdGFyIFN0YXRlLjwvcz48L2VtPjwvcD4NCg0KPHA+PGVtPjxzPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly84ZmczaXZuaDBnLWZseXdoZWVsLm5ldGRuYS1zc2wuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDIxLzAyL1NjcmVlbi1TaG90LTIwMjEtMDItMDItYXQtMTAuMDIuNDMtMS0xMDI0eDU5MS5wbmciIHN0eWxlPSJmbG9hdDpyaWdodDsgaGVpZ2h0OjI4OXB4OyBtYXJnaW46MTBweDsgd2lkdGg6NTAwcHgiIC8+PC9zPjwvZW0+PC9wPg0KDQo8cD5Gb3IgdGhlIHB1cnBvc2VzIGhlcmUsIHRoZSBtb2Rlcm4gdGhyZWF0IG5ldHdvcmsgaXMgY2hhcmFjdGVyaXplZCBhcyBjb2xsYWJvcmF0aXZlIGdyb3VwcyBvZiBwZW9wbGUgd2hvIG1heSBoYXZlIGRpZmZlcmVudCBtb3RpdmF0aW9ucyBidXQgYXJlIGZvcm1hbGx5IGludGVydHdpbmVkIHdoZW4gaXQgYmVuZWZpdHMgdGhlbSBhZ2FpbnN0IGEgY29tbW9uIGFkdmVyc2FyeS4gU29tZSBjYWxsIHRoZW0gJmxkcXVvO2FsbC1jaGFubmVsIG5ldHdvcmtzJnJkcXVvOyBvciAmbGRxdW87bmV0d29yayBvZiBuZXR3b3Jrcy4mcmRxdW87IFJlZ2FyZGxlc3Mgb2YgdGhlIG1vbmlrZXIsIHRoZXNlIG5ldHdvcmtzIGhhdmUgZGVzdGFiaWxpemVkIG11Y2ggb2YgdGhlIG1vZGVybiB3b3JsZDsgYW5kIG5vbmUgaXMgbW9yZSByZWxldmFudCB0byBUZXhhcyB0aGFuIHRoZSB0aHJlYXQgbmV0d29ya3MgZXN0YWJsaXNoZWQgaW4gVmVuZXp1ZWxhLjwvcD4NCg0KPHA+VmVuZXp1ZWxhJnJzcXVvO3MgSHVnbyBDaCZhYWN1dGU7dmV6IHVuZGVyc3Rvb2QgaG93IHRocmVhdCBuZXR3b3JrcyBlbmhhbmNlZCBhc3ltbWV0cmljIHdhcmZhcmUgY2FwYWJpbGl0aWVzIGFuZCB3ZW50IGFib3V0IGNvbnN0cnVjdGluZyB0aGVtIGZvciB0aG9zZSBlbmRzLjxhIGhyZWY9Imh0dHBzOi8vd3d3LnNlY3VyZWZyZWVzb2NpZXR5Lm9yZy9yZXNlYXJjaC93ZWFwb25pemluZy1uZXR3b3Jrcy1wYXJ0LW9uZS12ZW5lenVlbGFzLWFzeW1tZXRyaWMtYXR0YWNrLW9uLXRleGFzLz9nY2xpZD1DandLQ0Fqd2lZNk1CaEJxRWl3QVJGU0NQakZmcXV6U2wxTEcwV2ptOWM5RUoyeXFNZVJYeFZRLU9jWHVROVZnRGhnbDJ0a0p2S0o1SEJvQ25FVVFBdkRfQndFI19lZG44Ij5bdmlpaV08L2E+Jm5ic3A7Q2gmYWFjdXRlO3ZleiBkZXNpZ25lZCBuZXR3b3JrcyBpbiBWZW5lenVlbGEgYXMgZnVuY3Rpb25hbCBhcnJhbmdlbWVudHMgb2YgcGVvcGxlLCBnb29kcywgYW5kIHByb2R1Y3RzIHRpZWQgdG8gaWxsaWNpdCBhY3Rpdml0aWVzLCBzdWNoIGFzIGRydWcgdHJhZmZpY2tpbmcsIGFuZCB0byBsZWdhbCBjb21tZXJjaWFsIGVudGVycHJpc2UsIHN1Y2ggYXMgb2lsIHByb2R1Y3Rpb24gYW5kIGRlbGl2ZXJ5LiBIaXMgc3VjY2Vzc29yLCBOaWNvbCZhYWN1dGU7cyBNYWR1cm8sIGhhcyBhZHZhbmNlZCB0aGUgcmVhY2ggYW5kIGluZmx1ZW5jZSBvZiBWZW5lenVlbGEmcnNxdW87cyB0aHJlYXQgbmV0d29ya3MgdW5kZXIgdGhlIGd1aXNlIG9mIGZyZWUgdHJhZGUsIHdoaWxlIGFkaGVyaW5nIHRvIHRoZSBCb2xpdmFyaWFuIHJldm9sdXRpb24mcnNxdW87cyBzdGF0ZWQgZ29hbCBvZiB1bmRlcm1pbmluZyBVLlMuIGluZmx1ZW5jZS48YSBocmVmPSJodHRwczovL3d3dy5zZWN1cmVmcmVlc29jaWV0eS5vcmcvcmVzZWFyY2gvd2VhcG9uaXppbmctbmV0d29ya3MtcGFydC1vbmUtdmVuZXp1ZWxhcy1hc3ltbWV0cmljLWF0dGFjay1vbi10ZXhhcy8/Z2NsaWQ9Q2p3S0NBandpWTZNQmhCcUVpd0FSRlNDUGpGZnF1elNsMUxHMFdqbTljOUVKMnlxTWVSWHhWUS1PY1h1UTlWZ0RoZ2wydGtKdktKNUhCb0NuRVVRQXZEX0J3RSNfZnRuMSI+WzFdPC9hPiZuYnNwO0NoJmFhY3V0ZTt2ZXosIGFuZCBub3cgTWFkdXJvLCBhbHNvIHVuZGVyc3Rvb2QgdGhhdCBvbmUgb2YgdGhlIG1vc3QgaW1wb3J0YW50IGVsZW1lbnRzIGZvciB0aGVzZSBuZXR3b3JrcywgaW5kZWVkIGFueSBzdWNjZXNzZnVsIGFzeW1tZXRyaWMgd2FyZmFyZSBzdHJhdGVneSwgaXMgdGhlIHVzZSBvZiBjb3VudGVyaW50ZWxsaWdlbmNlIGFuZCBodW1hbiBpbnRlbGxpZ2VuY2UgKENJL0hVTUlOVCkgcGVyZm9ybWVkIGp1c3QgYmVsb3cgdGhlIHN1cmZhY2UuPC9wPg0KDQo8cD48c3Ryb25nPkNSSU1JTkFMIE5FVFdPUktTIEFTIENJL0hVTUlOVDwvc3Ryb25nPjwvcD4NCg0KPHA+SFVNSU5UIGlzIGFuIGludGVsbGlnZW5jZSBzcGVjaWFsdHkgd2hlcmUgaW5mb3JtYXRpb24gaXMgZ2F0aGVyZWQgdGhyb3VnaCBpbnRlcnBlcnNvbmFsIGNvbnRhY3QuIEl0IGlzIG5laXRoZXIgYSBwcmFjdGljZSBlbnRpcmVseSBvZiBpbnRhbmdpYmxlcyBhbmQgaW5zdGluY3QsIG5vciBpcyBpdCBhbiBleGFjdCBzY2llbmNlIHRoYXQgY2FuIGJlIG1lYXN1cmVkIGFuZCBvYnNlcnZlZC4gVGFrZSBmb3IgaW5zdGFuY2UgdGhlIHByb2Nlc3MgZm9yIGNyZWF0aW5nIGEgZmFsc2UgaWRlbnRpdHkgZm9yIGFuIHVuZGVyY292ZXIgYWdlbnQuIFRoZSBwcm9jZXNzIGRlbWFuZHMgaW1hZ2luYXRpb24sIGEgY29sbGVjdGlvbiBvZiBjcmVhdGl2ZSBtaW5kcyB3aG8gdGhyb3VnaCBleHBlcmllbmNlIGFuZCBrbm93bGVkZ2UgY2FuIHNjdWxwdCB0aGUgY29udG91cnMgb2YgdGhhdCBpZGVudGl0eSB0byBmaXQgYSBjdWx0dXJlIHdoZXJlIGl0IHdpbGwgZXhpc3QuIFRoYXQgcHJvY2VzcyBpcyBsYXJnZWx5IGFydGlzdGljIGluIG5hdHVyZS4gQmFja3N0b3BwaW5nIHRoZSBmYWtlIGlkZW50aXR5IHdpdGggYmlydGggY2VydGlmaWNhdGVzLCBjb2xsZWdlIGRlZ3JlZXMsIGRyaXZpbmcgcmVjb3JkLCBhbmQgZmFtaWx5IGhpc3RvcnkgcmVxdWlyZXMgdGVjaG5pY2FsIGFiaWxpdGllcywgd2hpY2ggaXMgbW9yZSBha2luIHRvIGEgc2NpZW5jZS4gSFVNSU5UIGNhbiBiZSBhbiBhcnQgYW5kIGEgc2NpZW5jZSB0byBjb250cm9sIGEgcGVyc29uIG9yIGFuIGVudGlyZSBwb3B1bGF0aW9uLjwvcD4NCg==', '20181214201919.jpg', 1, 1, '2021-11-04 15:01:59', 'lifestyle,selfwork', 'Lifestyle', 3),
(5, 'HUGO CHAVEZ, THE SPECTRE', 'With 4 million Venezuelans leaving the country since Hugo Chavez was elected just 20 years ago, weâ€™re witnessing the Western Hemisphereâ€™s worst humanitarian crisis in recent times.  Neighboring countries like Colombia and Brazil have been particularly hard hit, with some 600,000 refugees already in Colombia and 60,000 seeking asylum in Brazil since 2015 alone.  But how did it all happen?  ', 'PHA+U0ZTIEludGVybmF0aW9uYWwgRmVsbG93IGFuZCBCcmF6aWxpYW4gaW52ZXN0aWdhdGl2ZSBqb3VybmFsaXN0Jm5ic3A7TGVvbmFyZG8mbmJzcDtDb3V0aW5obyZuYnNwO2V4cGxhaW5zIHRoZSByb290cyBvZiBWZW5lenVlbGEmcnNxdW87cyBjb2xsYXBzZSBhbmQgZ2xvYmFsIGltcGFjdHMgaW4gaGlzIG5ldyBib29rLCAmbGRxdW87SHVnbyZuYnNwO0NoYXZleiwgTyBFc3BlY3RybyZyZHF1bzsgKEh1Z28mbmJzcDtDaGF2ZXosIFRoZSBTcGVjdHJlKS4mbmJzcDsgVGhpcyBleWUtb3BlbmluZyBleHBvc2UgcHJvdmlkZXMgYSBkZXRhaWxlZCB3aW5kb3cgaW50byBob3cgQ2hhdmV6IGFsbGllZCBoaW1zZWxmIHdpdGggZHJ1ZyB0cmFmZmlja2VycyBhbmQgdGVycm9yaXN0cyB0byBhZHZhbmNlIGhpcyBpZGVhIG9mIGEgcmV2b2x1dGlvbiB3aXRoaW4gTGF0aW4gQW1lcmljYSAmbWRhc2g7IHRvIHRoZSBkZXRyaW1lbnQgb2YgYW4gZW50aXJlIGhlbWlzcGhlcmUuJm5ic3A7PC9wPg0KDQo8cD48aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vOGZnM2l2bmgwZy1mbHl3aGVlbC5uZXRkbmEtc3NsLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxOS8xMC90aHVtYl9JTUdfMzAxOV8xMDI0LTEuanBnIiBzdHlsZT0iZmxvYXQ6bGVmdDsgaGVpZ2h0OjI2N3B4OyBtYXJnaW4tbGVmdDoyMHB4OyBtYXJnaW4tcmlnaHQ6MjBweDsgd2lkdGg6NDAwcHgiIC8+PC9wPg0KDQo8cD5oZSBXZXN0ZXJuIEhlbWlzcGhlcmUgU2VjdXJpdHkgRm9ydW0gKFdIU0YpLCBpcyB0aGUgcHJlbWllciBwb2xpY3kgZm9ydW0gY29uY2VybmluZyB0aGUgQW1lcmljYXMgZm9yIHRoZSBVLlMuIG5hdGlvbmFsIHNlY3VyaXR5IGNvbW11bml0eS4gVGhlIEZvcnVtIHNlZWtzIHRvIGVkdWNhdGUgcG9saWN5bWFrZXJzLCBlbGV2YXRlIHRoZSBpbXBvcnRhbmNlIG9mIHRoZSByZWdpb24gb24gdGhlIFUuUy4gbmF0aW9uYWwgc2VjdXJpdHkgYWdlbmRhLCBhbmQgY29ubmVjdCBwdWJsaWMgb2ZmaWNpYWxzIGFuZCBzY2hvbGFycyBmcm9tIGFjcm9zcyB0aGUgcmVnaW9uLjwvcD4NCg0KPHA+QXMgYSBwb2xpY3kgZm9ydW0sIG91ciB0YXJnZXQgYXVkaWVuY2UgY29uc2lzdHMgb2YgY29uZ3Jlc3Npb25hbCBtZW1iZXJzIGFuZCBzdGFmZmVycywgZGVmZW5zZSBhbmQgaW50ZWxsaWdlbmNlIHByb2Zlc3Npb25hbHMsIHRoZSBtZWRpYSwgYW5kIGEgdmFzdCBuZXR3b3JrIG9mIExhdGluIEFtZXJpY2FuIGFkdm9jYXRlcyBvZiBmcmVlZG9tIGFuZCBzZWN1cml0eSBmYXZvcmluZyBwb3NpdGl2ZSByZWxhdGlvbnMgdG8gdGhlIFVuaXRlZCBTdGF0ZXMuIENvbnNlcXVlbnRseSwgb3V0cmVhY2ggZWZmb3J0cyB3ZXJlIGFpbWVkIGF0IGNvbnZlbmluZyB0aGVzZSBjcml0aWNhbCBhY3RvcnMgdG8gZXhjaGFuZ2UgaW5zaWdodHMsIHBlcnNwZWN0aXZlcywgYW5kIHJlY29tbWVuZGF0aW9ucyBmb3IgYWN0aW9uIHRvIGVzdGFibGlzaCBhIHJvYnVzdCBkZWZlbnNlIG9mIG91ciBoZW1pc3BoZXJlIGFnYWluc3QgaW5jcmVhc2luZyB0cmFuc25hdGlvbmFsIHRocmVhdHMuJm5ic3A7PC9wPg0KDQo8cD5XaGlsZSBvdGhlcnMgaW4gRC5DLiBtYXkgaG9sZCBldmVudHMgYW5kIHBvbGljeSBmb3J1bXMgb24gdGhlIFdlc3Rlcm4gSGVtaXNwaGVyZSwgdGhleSBzZWxkb20gZW5nYWdlIHRoZSBuYXRpb25hbCBzZWN1cml0eSBjb21tdW5pdHksIG5vciBwcm9tb3RlIHRoZWlyIGV2ZW50cyBhcyBhZHZvY2F0ZXMgb2YgdGhlIGZyZWUgc29jaWV0eSBhcyBhIG1hdHRlciBvZiBjb3Vyc2UuPC9wPg0KDQo8cD5UaGUgV0hTRiBzZWVrcyB0byBlbGV2YXRlIHRoZSBpbXBvcnRhbmNlIG9mIHRoZSBXZXN0ZXJuIEhlbWlzcGhlcmUgb24gdGhlIFUuUy4gbmF0aW9uYWwgc2VjdXJpdHkgYWdlbmRhLiBUaGF0IGlzIG91ciBnb2FsLiBDb252ZW50aW9uYWwgdGhpbmtpbmcgYW5kIG9sZCB3YXlzIG9mIGVuZ2FnaW5nIHRoZSBBbWVyaWNhcyBoYXZlIHByb3ZlbiBpbmVmZmVjdGl2ZSBpbiBwcm9tb3RpbmcgYW5kIHByb3RlY3RpbmcgVS5TLiBuYXRpb25hbCBzZWN1cml0eSBpbnRlcmVzdHMgaW4gdGhlIHJlZ2lvbi4gSXQmcnNxdW87cyB0aW1lIGZvciBhIG5ldyBnZW5lcmF0aW9uIG9mIG5hdGlvbmFsIHNlY3VyaXR5IGxlYWRlcnMgdG8gcmlzZSBhbmQgcHJvdmlkZSBmcmVzaCBhbmQgaW5ub3ZhdGl2ZSBzb2x1dGlvbnMgdG8gdGhlIG15cmlhZCBvZiByZWdpb25hbCBzZWN1cml0eSBjaGFsbGVuZ2VzLiBJdCZyc3F1bztzIHRpbWUgZm9yIG5ldyB2b2ljZXMgdG8gYmUgaGVhcmQgd2l0aGluIHRoZSBzZWN1cml0eSBjb21tdW5pdHkgb2YgdGhlIEFtZXJpY2FzLCBhIGNvbW11bml0eSBsb29raW5nIGZvciBuZXcgYW5zd2VycyB0byBpbmNyZWFzaW5nbHkgY29tcGxleCBjaGFsbGVuZ2VzIChlLmcuIFZlbmV6dWVsYSkuIFNGUyBpcyBleHRyZW1lbHkgcHJvdWQgdG8gcHJvdmlkZSB0aGUgcGxhdGZvcm0gZm9yIHRoaXMgbmV3IGdlbmVyYXRpb24gdGhyb3VnaCBvdXIgV2VzdGVybiBIZW1pc3BoZXJlIFNlY3VyaXR5IEZvcnVtLjwvcD4NCg==', 'IMG_20181105_201250.jpg', 1, 1, '2021-11-04 15:08:23', 'business,adventure', 'Business', 3),
(6, 'New Year', 'This you will learn about the history of new year. If you have interest in it, please click the button which is written -> \"Read More\" ! ', 'PGgyPjxzdHJvbmc+PGVtPiZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgTmV3IFllYXIgaW4gT3VyIENvdW50cnk8L2VtPjwvc3Ryb25nPjwvaDI+DQoNCjxwPk5ldyBZZWFyIGlzIGEgZ3JlYXQgaG9saWRheSBpbiBvdXIgY291bnRyeS4gRXZlcnlib2R5IGxpa2VzIGl0IHZlcnkgbXVjaC4gSXQgaXMgZXNwZWNpYWxseSBsb3ZlZCBieSBsaXR0bGUgY2hpbGRyZW4uIFBlb3BsZSBkbyBub3QgZ28gdG8gd29yayBvbiB0aGF0IGRheSwgYW5kIGNoaWxkcmVuIGRvIG5vdCBnbyB0byBzY2hvb2wuIFRoaXMgaG9saWRheSBpcyBjb25zaWRlcmVkIHRvIGJlIGEgZmFtaWx5IGhvbGlkYXkuIEl0IGlzIHVzdWFsbHkgY2VsZWJyYXRlZCBhdCBob21lIGFtb25nIHRoZSBtZW1iZXJzIG9mIHRoZSBmYW1pbHkuPC9wPg0KDQo8cD5QZW9wbGUgZGVjb3JhdGUgdGhlaXIgaG91c2VzIGFuZCB1c3VhbGx5IGhhdmUgYSBmaXItdHJlZSB3aGljaCBzdGFuZHMgaW4gdGhlIGNvcm5lciBvZiB0aGUgcm9vbS4gVGhvc2UgZmlyLXRyZWVzIGFyZSB2ZXJ5IGJlYXV0aWZ1bC4gVGhlIHByZXNlbnRzIGFyZSB1c3VhbGx5IHB1dCB1bmRlciB0aGVzZSB0cmVlcy4gT3VyIHBhcmVudHMgcHJlcGFyZSB0byB0aGlzIGhvbGlkYXkgd2VsbC4gVGhleSBidXkgYSBOZXcgWWVhciB0cmVlLCBkZWNvcmF0ZSBpdCwgYnV5IGEgbG90IG9mIHRhc3R5IGZvb2QgYW5kIGRyaW5rcy48L3A+DQoNCjxwPjxpbWcgYWx0PSIiIHNyYz0iaHR0cDovL2VuZ21hc3Rlci5ydS9jb250ZW50L2ljb24vMTM4NjE4Mzg3MDY1LnBuZyIgc3R5bGU9ImZsb2F0OmxlZnQ7IGhlaWdodDoxODBweDsgbWFyZ2luOjEwcHg7IHdpZHRoOjI0MHB4IiAvPjwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD5BdCB0d2VsdmUgbyZyc3F1bztjbG9jayBpbiB0aGUgbmlnaHQgcGVvcGxlIGNhbiBzZWUgdGhlIHByZXNpZGVudCBvbiBUViB3aGljaCBhZGRyZXNzZXMgdGhlbSB3aXRoIHRyYWRpdGlvbmFsIHdvcmRzIG9mIGNvbmdyYXR1bGF0aW9uLiBBdCB0aGlzIHRpbWUgcGVvcGxlIGFyZSBzaXR0aW5nIGF0IHRoZSB0YWJsZXMgdG8gdGhlaXIgaG9saWRheSBkaW5uZXIgYW5kIGVuam95IGl0IGluIGEgZ29vZCBjb21wYW55LiBZb3VuZyBwZW9wbGUgdXN1YWxseSBvcmdhbml6ZSBhIGRhbmNlIHBhcnR5IGFuZCBoYXZlIGEgbG90IG9mIGZ1bi4gU29tZSBvZiB0aGVtIGdvIG91dCBpbnRvIHRoZSBzdHJlZXRzIGFuZCB0aGUgc3F1YXJlcy4gVGhlIG5leHQgZGF5IGZyaWVuZHMgdXN1YWxseSBjb21lIHRvIHdpc2ggYSBIYXBweSBOZXcgWWVhciB0byBhbGwgdGhlIG1lbWJlcnMgb2YgdGhlIGZhbWlseS48L3A+DQoNCjxwPlRoZSBOZXcgWWVhciBvZiBvdXIgbGlmZSBoYXMgYmVndW4uIEV2ZXJ5b25lIGhvcGVzIGl0IHdpbGwgcmVhbGx5IGJlIGhhcHB5LjwvcD4NCg==', 'IMG_20181105_201239.jpg', 1, 0, '2021-11-05 16:09:57', 'adventure', 'Adventure', 3),
(10, 'test', 'test', 'PHA+dGVzdDwvcD4NCg==', 'no-post.png', 0, 0, '2021-11-07 22:15:05', 'adventure', 'Lifestyle', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(2, 'Adventure'),
(5, 'Business'),
(11, 'Business'),
(1, 'Delicues Foods'),
(3, 'Food'),
(9, 'Food'),
(6, 'Freelancing'),
(4, 'Lifestyle'),
(10, 'Lifestyle'),
(12, 'Selfwork'),
(7, 'Walk'),
(8, 'Wedding');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(512) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bio` longtext NOT NULL,
  `roll` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `bio`, `roll`) VALUES
(3, 'Saidahmad', 'saidahmadhosilov134679@gmail.com', '$2y$10$tsOY3EaH062mpkRUnRqdyu7nRSn4VTdyHZAxDJniDPAOgJbfr6laS', '20181213161903.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tenetur impedit odit id eaque officia exercitationem delectus, autem dolorem illum alias laudantium architecto quod reprehenderit voluptatum, ad aut, soluta nulla!\r\n', 'admin'),
(4, 'Salohiddin', 'test2@test.com', '$2y$10$xieuHflZC6ELDtTSOYlJ2.U2Y4ZHHXvJd8XoWtO.8xiNDKe0.8BD2', 'vincentiu-solomon-7MH4ped6_Mo-unsplash.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tenetur impedit odit id eaque officia exercitationem delectus, autem dolorem illum alias laudantium architecto quod reprehenderit voluptatum, ad aut, soluta nulla!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tenetur impedit odit id eaque officia exercitationem delectus, autem dolorem illum alias laudantium architecto quod reprehenderit voluptatum, ad aut, soluta nulla!\r\n', 'operator'),
(7, 'Test User', 'zebohodzaeva1934@gmail.com', '$2y$10$iZ4IBomlhC6gNz.SsJdMr.eaafeQUl3L5PEMKL9RUBK9g4wWYoP1i', 'no-image.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tenetur impedit odit id eaque officia exercitationem delectus, autem dolorem illum alias laudantium architecto quod reprehenderit voluptatum, ad aut, soluta nulla!\r\n', NULL),
(8, 'Javlonbek', 'Javlon@gmail.com', '$2y$10$iW2QGVtudVtAzNrhRJlmMeQtnZZC7EzYllPzIs/5zU.NzAqEhl6lu', 'no-image.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tenetur impedit odit id eaque officia exercitationem delectus, autem dolorem illum alias laudantium architecto quod reprehenderit voluptatum, ad aut, soluta nulla!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tenetur impedit odit \r\n', 'operator'),
(9, 'Ulugbek', 'ulugbek@gmail.com', '$2y$10$ZmEpR057JULzmHU1OW.7TewJKsCMzQXcHJuThHBcf0rVRuGQDf3E.', 'no-image.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tenetur impedit odit id eaque officia exercitationem delectus, autem dolorem illum alias laudantium architecto quod reprehenderit voluptatum, ad aut, soluta nulla!\r\n', NULL),
(10, 'Leapold', 'leapold@gmail.com', '$2y$10$le.G7nJWoAX.M8vJRaEtd.k2rCVgXa28MNT3ZHKWiXeJFT1lbomTy', 'IMG_20181105_201225.jpg', 'men TV ko\'rishni yoqtiraman. Menga muzqaymoq yoqadi.', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ctg_id_fk` (`ctg_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ctg_name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk_idx` (`user_id`),
  ADD KEY `post_id_fk_idx` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ctg_name_fk_idx` (`ctg_name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `ctg_id_fk` FOREIGN KEY (`ctg_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `post_id_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `ctg_name_fk` FOREIGN KEY (`ctg_name`) REFERENCES `categories` (`name`),
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
