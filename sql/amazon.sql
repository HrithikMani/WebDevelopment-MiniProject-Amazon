-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 02:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--

--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(60) NOT NULL,
  `subcategory` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `subcategory`) VALUES
(1, 'Electronics', 'Laptop'),
(3, 'Electronics', 'Mobiles'),
(4, 'Fashion', 'Kids'),
(5, 'Fashion', 'Men'),
(6, 'Fashion', 'Women'),
(7, 'Books', 'Novels'),
(8, 'Books', 'Educative'),
(26, 'Grocery', 'Dairy'),
(33, 'Electronics', 'Keyboard'),
(43, 'Electronics', 'Gaming Consoles'),
(44, 'Grocery', 'Fruits'),
(45, 'Grocery', 'Vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `amazonbal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `email`, `password`, `phone`, `firstname`, `lastname`, `amazonbal`) VALUES
(1, 'hrithik.mani2000@gmail.com', 'amazon123', '9652608434', 'hrithik mani', 'k', '92143.88'),
(2, 'amazon123@gmai.com', 'amazon123', '9652608434', 'hrithik mani', 'k', '0.00'),
(10, '123@gmail.com', '1234567', '9876543210', 'Govind', 'Sai Ram', '0.00'),
(12, '123@yahoo.com', '1234567', '9876543210', 'govind ', 'sai ram', '9614.00'),
(13, 'vs2510257@gmail.com', 'Neekendukra', '9010540816', 'Vamshi', 'S', '10000.00'),
(14, 'kasamnikhilreddy16@gmail.com', '8008559556', '8008559556', 'Nikhil', 'Reddy', '10000.00'),
(15, 'sai@gmail.com', '123456789', '9347024304', 'sai', 'nath', '9979.00');

-- --------------------------------------------------------

--
-- Table structure for table `dealcat`
--

CREATE TABLE `dealcat` (
  `dealid` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `noitems` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `dealid` int(11) NOT NULL,
  `disc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`dealid`, `disc`) VALUES
(1, 40),
(2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `address` text NOT NULL,
  `quantity` int(2) NOT NULL,
  `orderstatus` int(1) NOT NULL,
  `amtpaid` decimal(10,2) NOT NULL,
  `defectstatus` int(1) NOT NULL,
  `transactionno` varchar(40) NOT NULL,
  `mode` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `pid`, `cid`, `address`, `quantity`, `orderstatus`, `amtpaid`, `defectstatus`, `transactionno`, `mode`) VALUES
(13, 5, 1, 'fafsdfa', 1, 0, '979.95', 0, '07081f854b7e78db24ab8ec58fe5bf4b', 3),
(17, 5, 1, 'adadaddadaddddada', 3, 0, '2939.85', 0, '8f55247d76119f8093531da1fb537d0c', 2),
(18, 1, 12, 'yes this is almost done', 1, 0, '21.00', 0, '42141db8726bf45d362b1f030f9b152d', 2),
(19, 4, 12, 'yes this is done\n', 1, 0, '365.00', 0, '59aca06b54f8e8b204c641856cbd3652', 2),
(21, 1, 14, 'JFK', 2, 0, '42.00', 0, '1cde8f4dad2e9deddcf1eea91e079845', 3),
(22, 1, 15, 'hyderabad', 1, 0, '21.00', 0, '844489ef33ddcad68827b598848fb68c', 2),
(23, 68, 1, 'abc', 3, 0, '1.50', 0, 'ec43e831ddf486283950502039b108cd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` decimal(11,2) NOT NULL DEFAULT 0.00,
  `category` int(4) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `category`, `stock`, `image`) VALUES
(6, 'ASUS TUF Gaming A15 Gaming Laptop, 15.6” 144Hz Full HD IPS-Type Display, AMD Ryzen 5 4600H, GeForce GTX 1650, 8GB DDR4, 512GB PCIe SSD, RGB Keyboard, Windows 10 Home, Bonfire Black, FA506IH-AS53', 'NVIDIA GeForce GTX 1650 4GB GDDR6 Graphics (Base: 1380MHz, Boost: 1515MHz, TDP: 50W)\r\nAMD Ryzen 5 4600H Processor (up to 4.0 GHz)\r\n15.6” 144Hz FHD (1920x1080) IPS-Type display\r\n512GB PCIe NVMe M.2 SSD | 8GB DDR4 3200MHz RAM | Windows 10 Home\r\nDurable MIL-STD-810H military standard construction\r\nDual fans with self-cleaning anti-dust technology to extend system longevity\r\nRGB Backlit keyboard rated for 20-million keystroke durability\r\nGigabit Wave 2 Wi-Fi 5 (802.11ac)\r\nBundle: Get 30 days of Xbox Game Pass for PC with purchase', '839.99', 1, 10, 'img/products/electronics/laptop6.jpg'),
(7, 'SONY PLAYSTATION 5 PS5 CONSOLE COMPLETE SET (IMPORTED)', 'Lightning Speed - Harness the power of a custom CPU, GPU, and SSD with Integrated I/O that rewrite the rules of what a PlayStation console can do.\r\n\r\n', '1340.13', 2, 10, 'img/products/electronics/ps5.jpg'),
(22, 'New Apple iPhone 12 Pro Max (128GB) - Pacific Blue', '6.7-inch (17 cm diagonal) Super Retina XDR display\r\nCeramic Shield, tougher than any smartphone glass\r\nA14 Bionic chip, the fastest chip ever in a smartphone\r\nPro camera system with 12MP Ultra Wide, Wide and Telephoto cameras; 5x optical zoom range; Night mode, Deep Fusion, Smart HDR 3, Apple ProRAW, 4K Dolby Vision HDR recording\r\nLiDAR Scanner for improved AR experiences, Night mode portraits\r\n12MP TrueDepth front camera with Night mode, 4K Dolby Vision HDR recording\r\nIndustry-leading IP68 water resistance\r\nSupports MagSafe accessories for easy attach and faster wireless charging\r\niOS with redesigned widgets on the Home screen, all-new App Library, App Clips and more', '1199.00', 3, 0, 'img/products/Mobiles/69c8f774d4e4d96bd617de64d56825c7.jpg'),
(24, 'LG Wing Aurora Gray, 8GB RAM, 128GB Storage', 'Versatile Multi-Screen Form Factor with Swivel Mode\r\n17.3cm (6.8) FHD+ OLED Main Display & 9.9cm (3.9) OLED Secondary Display\r\n64MP 13MP Ultra-Wide & 12MP Ultra-Wide Angle Rear Cameras\r\n32MP Pop-up Selfie Camera\r\nLG 3D Sound Engine & Stereo Speakers | IP54 and MIL-STD 810G Certified', '549.00', 3, 0, 'img/products/Mobiles/b5a679a7eafa674c435b8054d715c7b8.jpg'),
(25, 'OnePlus 8 Pro (Onyx Black 12GB RAM+256GB Storage)', '48MP rear camera with 4k video at 30/60 fps, 1080p video at 30/60 fps, super slow motion: 720p video at 480 fps, 1080p video at 240fps, time-lapse: 1080p 30fps, 4k 30fps, cine aspect ratio video recording, video hdr, cat&dog face detect & focus, ultrashot hdr, nightscape, super micro, portrait, pro mode, panorama, ai scene detection, raw image, audio zoom, audio 3d, infrared photography camera | 16MP front camera\r\n17.22 centimeters (6.78-inch) 120Hz fluid display with 3168 x 1440 pixels resolution, 513 ppi pixel density and vibrant color effect color support\r\nMemory, Storage & SIM: 12GB RAM | 256GB internal memory | Dual SIM (nano+nano) dual-standby (5G+5G)\r\nOxygen OS based on Android v10 operating system with 2.86GHz of clock speed with Qualcomm Snapdragon 865, powered by Kryo 585 CPU octa core processor, Adreno 650\r\n4510mAH lithium-ion battery\r\n1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase\r\nBox also includes: Warp charge 30t power adapter, warp type-c cable (support usb 2.0), quick start guide, welcome letter, safety information and warranty card, logo sticker, case, screen protector (pre-applied), sim tray ejector', '799.00', 3, 0, 'img/products/Mobiles/8de8ee02644033e722f71cf2f11ee31f.jpg'),
(26, 'Huawei P40 Pro (Black, 8GB RAM, 256GB Storage)', 'Ultra Vision Leica Quad Camera: 50 MP Ultra Vision Sensor, 40 MP Ultra Wide Cine Camera, 12 MP Telephoto Cameras, 3D Depth Sensing Camera）\r\nQuad-curve Overflow Display, IP68: The Quad-Curve Overflow Display is innovated to dissolve the barriers of vision and imagination on every edge. Plus with the 90 Hz refresh rate\r\nWi-Fi 6 Plus: Using Dynamic Narrow Bandwidth technology, the Wi-Fi 6 Plus enabled phone penetrates more walls and floors\r\n5G & Outstanding Performance: Embrace the ultra-fast speed with the world’s first integrated 5G SoC, Kirin 990 5G chipset.', '999.00', 3, 0, 'img/products/Mobiles/99059f055cffd992731ce978598d5191.jpg'),
(28, 'Vivo X50 Pro (Alpha Grey, 8GB RAM, 256GB Storage)', '8+13+8+8MP rear camera | 32MP front camera\r\n16.66 centimeters (6.56 inch) curved ultra O display with 1080 x 2376 pixels resolution\r\nMemory, Storage & SIM: 8GB RAM | 256GB internal memory | Dual SIM (nano+nano) dual-standby (4G+4G)\r\nFuntouch OS 10.5 Based on Android 10 operating system with Qualcomm Snapdragon 765G octa core processor\r\n4315mAH lithium-ion battery\r\n1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase\r\nBox also includes: Earphone (XE710), documentation, microusb to USB cable, USB power adaptor, sim ejector, protective case, protective film (applied)', '499.00', 3, 0, 'img/products/Mobiles/ac1c413de1d932341804f9cba5159a1c.jpg'),
(31, 'New Apple iPhone 12 (128GB) - White', '6.1-inch (15.5 cm diagonal) Super Retina XDR display\r\nCeramic Shield, tougher than any smartphone glass\r\nA14 Bionic chip, the fastest chip ever in a smartphone\r\nAdvanced dual-camera system with 12MP Ultra Wide and Wide cameras; Night mode, Deep Fusion, Smart HDR 3, 4K Dolby Vision HDR recording\r\n12MP TrueDepth front camera with Night mode, 4K Dolby Vision HDR recording\r\nIndustry-leading IP68 water resistance\r\nSupports MagSafe accessories for easy attach and faster wireless charging\r\niOS with redesigned widgets on the Home screen, all-new App Library, App Clips and more', '749.00', 3, 0, 'img/products/Mobiles/e86578c853d7c0d95652485b20e192cf.jpg'),
(32, 'OnePlus Nord 5G (Blue Marble, 12GB RAM, 256GB Storage)', '48MP+8MP+5MP+2MP quad rear camera with 1080P Video at 30/60 fps, 4k 30fps | 32MP+8MP front dual camera with 4K video capture at 30/60 fps and 1080 video capture at 30/60 fps\r\n6.44-inch 90Hz fluid Amoled display with 2400 x 1080 pixels resolution | 408ppi\r\nMemory, Storage & SIM: 12GB RAM | 256GB internal memory | OnePlus Nord currently support dual 4G SIM Cards or a Single 5G SIM. 5G+4G support will be available via OTA update at a future date.\r\nOxygenOS based on Android 10 operating system with 2.4GHz Kryo 475 Prime + 2.2GHz Kryo 475 Gold + 6x1.8GHz Kryo 475 Silver Qualcomm Snapdragon 765G 5G mobile platform octa core processor, Adreno 620 GPU\r\n4115mAH lithium-ion battery | In-Display fingerprint sensor\r\n1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase\r\nCorning Gorilla Glass 5 | 12GB GB LPDDR4X, 256GB UFS 2.1', '449.00', 3, 0, 'img/products/Mobiles/6850b31a154704ba89f01cd6baff638f.jpg'),
(34, 'OPPO Reno5 Pro 5G (Astral Blue, 8GB RAM, 128GB Storage)', '3D Borderless Sense Screen | AI Highlight Video (Ultra Night Video + Live HDR) | Super AMOLED Display\r\n64MP + 8MP + 2MP + 2MP | 32MP Front Camera\r\nInnovative 65W SuperVOOC 2.0 flash charging brings the 4350 mAh battery,5 minutes charging & 4hours of video playback, fully charging in 30 minutes.\r\n16.64 cm (6.55 inch) Full HD+ Display with 2400x1080 resolution.\r\nColor OS 11.1 based on Android v11.0 operating system with 2.6GHz MediaTek Dimensity 1000+ (MT6889) Processor, ARM G77 MC9 836 MHz', '349.00', 3, 0, 'img/products/Mobiles/336a084b26f8f729ba520e5edacda863.jpg'),
(35, 'Google Pixel 5 5G 128GB - Just Black', 'Google Pixel 5 5G (8GB RAM, 128GB) Just Black\r\n5G capable smartphone gives you an extra boost of speed so you can download a movie in seconds, enjoy smooth streaming in ultra clear HD, play games at home and on the go, and even share your 5G speed with friends\r\nYour phone will automatically receive the latest OS and security updates for at least 3 years; the custom-made Titan M chip helps secure the operating system and sensitive data, like passwords\r\nTake vibrant photos on your phone even in the dark with Night Sight, bring studio quality light to your pictures of people with Portrait Light, and get more scenery and people in the shot with the rear facing ultrawide lens\r\nPixel 5 is a water resistant smart phone; the metal unibody can handle being submerged in 1.5 meters of fresh water for 30 minutes', '649.00', 3, 0, 'img/products/Mobiles/fa0f1449ee84c7ffed66c7f0f02c6908.jpg'),
(36, 'HP Pavilion x360 Touchscreen 2-in-1 FHD 14-inch Laptop 14-inch Laptop (10th Gen Core i5-10210U/8GB/512GB SSD/Win 10/MS Office/Mineral Silver/1.58 kg)', 'Processor: 10th Gen Intel Core i5-10210U (1.6 GHz base frequency, up to 4.2 GHz with Intel Turbo Boost Technology, 6 MB L3 cache, 4 cores)\r\nOperating System & Preinstalled Software: Windows 10 Home | Microsoft Office Home & Student 2019 | In the box: Laptop with included battery, charger\r\nDisplay: 14-Inch FHD (1920 x 1080), touch-enabled, IPS, edge-to-edge glass, micro-edge, 250 nits, 45% NTSC | Without Inking Pen\r\nMemory & Storage: 8GB DDR4, expandable upto 16 GB | 512GB PCIe NVMe M.2 SSD\r\nGraphics: Intel UHD Integrated Graphics\r\nDesign & Battery: Touchscreen and Convertible Laptop | Laptop weight: 1.58 kg | Average battery life = 7 hours, 3-cell, 41 Wh Li-ion Fast Charge Battery\r\nCamera & Microphone: HP TrueVision HD camera with integrated dual array digital microphone', '679.00', 1, 0, 'img/products/Laptop/6203b1b0e2fd5ccacbb6f46c5404a6b8.jpg'),
(37, 'Lenovo Thinkpad E14 Intel Core i5 10th Gen Display 14-inch Full HD Thin and Light Laptop (8GB RAM/ 1TB HDD + 128GB SSD/ Windows 10 Home/Microsoft Office Home & Student 2019/ Black/ 1.69kg)', 'ThinkPad Reliability (12 Military Specifications Certified) | Built to withstand rugged usage and can handle accidental knocks, drops, and even spills\r\nProcessor: 10th Gen Intel Core i5-10210U processor, 1.6Ghz base speed, 4.2Ghz max speed, 4Cores, 6Mb Smart Cache\r\nOperating System: Pre-loaded Windows 10 Home with lifetime validity\r\nDisplay: 14-inch screen with (1920X1080) Full HD Display | Anti Glare technology | 720p HD Camera with Thinkshutter | Connectivity: Intel AX201 11ax, 2x2 + BT5.0 | Audio: Skype-certified mics and 2x 2W Harman speakers with Dolby Advanced Audio | Dual array microphone\r\nMemory: 8GB RAM | Storage: 1TB HDD + 128GB SSD\r\nDesign and battery: Thin and light Laptop | 180 Degree Hinge | Laptop weight 1.69kg | Battery Life: Upto 12.8 hours* as per MobileMark | Rapid Charge (80% in 1 hour)\r\nPre-installed software: Microsoft Office Home & Student 2019 | Inside the box: Laptop with battery, Charger, User manual\r\nPorts & CD drive: One USB 2.0 | Two USB 3.1 Gen 1 (one Always On) | One USB 3.1 Type-C Gen 1 (with the function of Power Delivery and DisplayPort) | HDMI 1.4b | Ethernet RJ-45 (LAN Port) | Headphone/microphone combo jack | Security keyhole | Without DVD-drive\r\nSecurity: Integrated power button with touch FPR for power-on and secure login in one touch | Discrete TPM 2.0 chip for encryption of data and passwords | ThinkShutter for privacy from hackers and intruders | Spill Resistant Backlit Keyboard with Trackpoint\r\nThis genuine Lenovo Laptop comes with 1 Year Onsite Warranty and now its pre-bundled with 1 year Premier Support also ( 24*7*365 dedicated line to advanced technician, Comprehensive hardware & OEM software support, Fast unscripted solutions and parts prioritization, Technical Account Managers and single point of contact )', '549.00', 1, 0, 'img/products/Laptop/c77146f630a00a1c189615e21bd31fa0.jpg'),
(38, 'Dell Inspiron 5390 13.3\" FHD Laptop--Intel Core i5 8th Gen || 8 GB || 512 GB SSD || Windows 10 with Office || Platinum Silver ||', 'Processor: 8th gen Intel Core i5-8265U processor, 1.60 GHz base upto 3.90 GHz processor speed\r\nOperating System: Pre-loaded Windows 10 with lifetime validity with Pre-installed Software: MS Office Home & Student 2019 |\r\nDisplay: 13.3-inch Full HD (1920x1080) display with Intel UHD Graphics, True Life LED Backlight Non Touch Narrow Border WVA Display\r\nMemory : 8GB DDR4 RAM | Storage: 512 GB M.2 PCe NvMe Solid State Drive (SSD)\r\nIn the Box: Laptop with included battery, charger, user guide and manual', '699.00', 1, 0, 'img/products/Laptop/bbc9ff925f99a78fc1056973c2f788a7.jpg'),
(39, 'ASUS VivoBook 15 Intel Core i5-1035G1 10th Gen 15.6-inch FHD Thin and Light Laptop (8GB RAM/1TB HDD + 256GB SSD/Windows 10/MS Office 2019/2GB NVIDIA MX330 Graphics/Grey/1.75 kg)', 'Processor: 10th Gen Intel Core i5-1035G1 Processor, 1.0 GHz (6MB Cache, up to 3.6 GHz, 4 Cores, 8 Threads)\r\nMemory & Storage: 8GB (2x 4GB) DDR4 3200MHz Dual Channel RAM, upgradeable up to 12GB using 1x SO-DIMM Slot with | Storage: 1TB SATA 5400RPM 2.5\" HDD + 256GB M.2 NVMe PCIe 3.0 SSD\r\nGraphics: Dedicated NVIDIA GeForce MX330 GDDR5 2GB VRAM\r\nDisplay: 15.6-inch (16:9) LED-backlit FHD (1920x1080) Anti-Glare Panel with 45% NTSC, 88% Screen-to-body ratio\r\nSoftware Included: Pre-installed MS Office Home and Student 2019 | Operating System: Pre-loaded Windows 10 Home with lifetime validity\r\nDesign & Battery: 5.7mm Thin Bezels | Laptop weight 1.75 kg | Thin and Light Laptop | 37WHrs, Lithium-Polymer, 2-cell battery\r\nKeyboard: Full-Size Backlit Chiclet Keyboard with Num-key | 1.4mm Key-travel Distance | 19mm full size key pitch | 2° ErgoLift Hinge for a comfortable typing position\r\nI/O Ports: 1x HDMI 1.4, 1x 3.5mm Combo Audio Jack, 2x USB 2.0 Type-A, 1x USB 3.2 Gen 1 Type-A, 1x USB 3.2 Gen 1 Type-C, 1x Micro SD card reader\r\nOther: Fingerprint Sensor With Windows Hello Support| Wi-Fi 5 (802.11ac) 2*2 | Bluetooth 4.2 | HD web camera | Built-in speaker | Built-in microphone\r\nWarranty: This genuine Asus laptop comes with 1 year manufacturer warranty on the device and 6 months manufacturer warranty on included accessories from the date of purchase. For product related queries contact the brand at contact_us on: [ 18002090365 ].', '549.99', 1, 0, 'img/products/Laptop/c30efdd55ac25280355e1d602608b39f.jpg'),
(40, 'ASUS ROG Zephyrus G14, 14\" QHD, Ryzen 9 4900HS, RTX 2060 Max Q 6GB Graphics, Gaming Laptop (32GB/1TB SSD/Office 2019/Windows 10/Gray/Anime Matrix/1.7 Kg)', 'Processor: AMD Ryzen 9 4900HS Processor, 3.0 GHz (8MB Cache, up to 4.3 GHz, 8 Cores, 16 Threads)\r\nAccess to over 100 high-quality PC games on Windows 10\r\nOne-month subscription to Xbox Game Pass that’s included with the purchase of your device\r\nSoftware Included: Pre-installed MS Office Home and Student 2019 | Operating System: Pre-loaded Windows 10 Home (64bit) with lifetime validity\r\nGraphics: Dedicated NVIDIA GeForce RTX 2060 Max Q GDDR6 6GB VRAM\r\nMemory: 32GB DDR4 Dual Channel 3200MHz RAM with | Storage: 1TB SSD M.2 NVMe PCIe 3.0\r\nDisplay: 14-inch (16:9) QHD (2560x1440), 300 nits Brightness, Anti-Glare IPS-level panel, 100% sRGB, Pantone Validated, Adaptive sync, 85% screen-to-body ratio\r\nDesign & battery: NanoEdge bezels | Metallic Body | with AniMe Matrix display| 6,536 CNC Milled Dot Matrix Design| Honeycomb Reinforcement Chassis | Thin and Light Laptop| 19.9mm Thin | Laptop Weight: 1.70 Kg | 76WHrs, 4-cell Lithium-Polymer Battery\r\nI/O Ports: 1x 3.5mm combo audio jack, 1x USB 3.2 Gen 2 Type-C, 2x USB 3.2 Gen 1 Type-A, 1x Type C USB 3.2 Gen 2 with Power Delivery, Display Port 1.4 and G-Sync Support, 1x HDMI 2.0b\r\nOther: One Touch Login Power and Fingerprint Reader| White Backlit Keyboard | Intel Wi-Fi 6 (Gig+) (802.11ax) 2*2 | Bluetooth 5.0 | Quad Speakers | Built-in array microphone | without Web Camera | ROG sleeve for 14-inch Laptop', '1299.00', 1, 0, 'img/products/Laptop/b31807a06bb9d6f5e2b70bb74de04623.jpg'),
(41, 'Logitech MK540 Wireless Keyboard and Mouse Combo for Windows, 2.4 GHz Wireless with Unifying USB-Receiver, Wireless Mouse, Multimedia Hot Keys, 3-Year Battery Life, PC/Laptop - Black', 'Precision Typing : An instantly familiar experience, type with ease and comfort on this full-size wireless keyboard. Accuracy and reduced noise, palm rest, spill-resistant design, adjustable tilt legs\r\nBuilt For Comfort : The sleek spill-resistant combo comes with a wireless mouse; its ambidextrous shape, soft rubber side grips fit comfortably in your palm; enhanced tracking, precise cursor control\r\nLong-Lasting Autonomy : The wireless keyboard and mouse come with long-lasting battery life, with the keyboard lasting up to 36 months, the wireless mouse for up to 18 months - depending on the usage\r\nCustomised Control : Enhanced productivity at your fingertips, the keyboard comes built with the convenient, essential hot keys providing direct access to media, calculator, battery check functions\r\nWireless Freedom : Plug-and-play your keyboard and mouse with the mini Logitech Unifying USB-receiver, for a reliable and encrypted wireless connection up to 10 m awayfrom your PC or laptop\r\nCompatible with: Windows 10 or later, Windows 8, Windows 7, Chrome OS. WiFi range (in meters): 32.81 ft (10 m)', '69.00', 33, 0, 'img/products/Keyboard/d44856ce3c1e70077055542052988b25.jpg'),
(42, 'Zebronics ZEB-KM2100 Multimedia USB Keyboard Comes with 114 Keys Including 12 Dedicated Multimedia Keys & with Rupee Key', 'Superior Built Quality: The keyboard has a superior Quality and is built to last.\r\nModular Design: The modular design on the keyboard makes customizations a possibilty.\r\nUSB interface: The keyboard comes with an USB interface making it compatible with most of the PCs\r\nUV Printed Keycaps: The keycaps are UV printed helping that inscriptions on the kepscaps to last long\r\nPlug & play: Just connect the USB connector to your PC and you are ready to go. Compatible with Windows XP/Vista/7/8/10\r\nFor feedback & Support, Call us on: 9360942527 or Write to us on: support@zebronics.com\r\nCountry of Origin: China', '0.99', 33, 0, 'img/products/Keyboard/8ec47e8ef2e1de71325700211f89b1e8.jpg'),
(43, 'Zebronics Zeb-Transformer Gaming Keyboard and Mouse Combo (USB, Braided Cable)', 'Multicolor LED ( 4 modes - 3 light modes and 1 off mode ),Integrated media control Windows key Disable / Enable function\r\nAll Keys Disable / Enable function , All Keys Disable / Enable function\r\n2-steps stand design, Laser keycaps\r\nAluminum body, Backlight LED On / Off function\r\nBraided cable, high quality USB connector', '11.99', 33, 0, 'img/products/Keyboard/229a9f371a48a1cd80255a7c57188593.jpg'),
(44, 'HP K500F Gaming Keyboard (7ZZ97AA)', 'Specially added LED backlight, with monochromatic or mixed light options, showing its elegant temperament\r\nGaming buttons rated at up to 10 million-clicks, With a thick keyboard with responsive keys\r\nCompatibility - Windows7 /Windows 8 / Windows10', '19.00', 33, 0, 'img/products/Keyboard/8760d6af581c1a5b8174723e3cf21da1.jpg'),
(45, 'HP 100 Wired USB Keyboard', 'Features a full range of 109 keys, including 12 working function keys and 3 hot keys\r\nCable Length: 1.5 meters, Interface Type: USB\r\nConnection is a breeze with USB connectivity so you can get up and running fast\r\nCompatible with Windows 7/8/10 Operating Systems and available USB port compatibility, adjustable height\r\nDimensions: 46.5 x 17 x 3 cm, weight: 0.49 kg\r\nCountry of Origin: China', '1.99', 33, 0, 'img/products/Keyboard/cfd7a89b34414a8e1a7b213810874ff1.jpg'),
(46, 'Quantum QHM9800 Rapid Strike Mechanical Gaming Multimedia Wired Keyboard with 6-Colour RGB LED, 12 Adjustable Lighting Modes, Lasting Durability and Rupee (₹) Key (Black)', 'PLUG & PLAY: Instant connect with the stable transmission that removes any scope for lags to occur.\r\nLED DESIGN: The LED-backlit keyboard allows multi-key to work simultaneously with high speed, and will never miss a single key-press or confuse your commands under any conditions.\r\nSPILL-PROOF: The keyboard protects against any accidental spills and accidental water splashes which makes it a safe bet for everyday usage.\r\nINDIVIDUAL SWITCHES: The QHM9800 has hot-swappable B23 switches with full key rollover.\r\nRAINBOW EFFECT: There are 6 LED RGB Colours with 12 adjustable light modes which provide the keyboard with funky illumination effects.\r\nHIGHLY DURABLE: The heavy-duty mechanical keyboard is made up of powerful robust materials which is what every gamer roots for.\r\nTACTILE SETUP: Tactile key bumps are considered the optimal choice for gaming. It offers great feedback while typing and you get to know with the sound if your keystrokes are getting logged.\r\nWARRANTY: 1-year warranty from the date of purchase as provided by the manufacturer.\r\nCUSTOMER SUPPORT: For any product related query or service related issue please call us at +91 8860778888 (Monday to Saturday 10 am to 7 pm) or feel free to write us at support@qhmpl.com.', '7.99', 33, 0, 'img/products/Keyboard/f59787eba9931a29c2d0726bedce4e2b.jpg'),
(47, 'Quantum QHM9800 Rapid Strike Mechanical Gaming Multimedia Wired Keyboard with 6-Colour RGB LED, 12 Adjustable Lighting Modes, Lasting Durability and Rupee (₹) Key (Black)', 'PLUG & PLAY: Instant connect with the stable transmission that removes any scope for lags to occur.\r\nLED DESIGN: The LED-backlit keyboard allows multi-key to work simultaneously with high speed, and will never miss a single key-press or confuse your commands under any conditions.\r\nSPILL-PROOF: The keyboard protects against any accidental spills and accidental water splashes which makes it a safe bet for everyday usage.\r\nINDIVIDUAL SWITCHES: The QHM9800 has hot-swappable B23 switches with full key rollover.\r\nRAINBOW EFFECT: There are 6 LED RGB Colours with 12 adjustable light modes which provide the keyboard with funky illumination effects.\r\nHIGHLY DURABLE: The heavy-duty mechanical keyboard is made up of powerful robust materials which is what every gamer roots for.\r\nTACTILE SETUP: Tactile key bumps are considered the optimal choice for gaming. It offers great feedback while typing and you get to know with the sound if your keystrokes are getting logged.\r\nWARRANTY: 1-year warranty from the date of purchase as provided by the manufacturer.\r\nCUSTOMER SUPPORT: For any product related query or service related issue please call us at +91 8860778888 (Monday to Saturday 10 am to 7 pm) or feel free to write us at support@qhmpl.com.', '7.99', 33, 0, 'img/products/Keyboard/d573cca32700be5dd458eceef04b1341.jpg'),
(48, 'Sony PlayStation 4 Pro 1TB Console - Black (PS4 Pro)', 'PlayStation 4 Pro - the super charged PS4 - take play to the next level with PS4 Pro: See every detail explode into life with 4K gaming and entertainment, experience faster, smoother frame rates and more powerful gaming performance and enjoy richer, more vibrant colours with HDR technology\r\n4K gaming and entertainment - games and movies shine with amazing 4K clarity; graphics become sharper and more realistic, skin tones become warmer and more lifelike, while textures and environments burst into life like never before\r\nHigh dynamic range - With an HDR enabled TV, compatible PS4 games display an intensely vibrant range of colours, closer to the full spectrum that the human eye can see\r\nEnhanced games - PS4 Pro games burst into life with intensely sharp graphics, stunningly vibrant colours, textures and environments and smoother, more stable performance; every PS4 game is playable on PS4 Pro at a minimum of 1080p, while others get a boost to enhance their graphics to incredible 4K. No matter what TV you play on, all PS4 games benefit from enhanced graphics and smoother, faster, more detailed action\r\nThe best in 4K entertainment - stream the biggest movies, hottest TV shows and latest videos in 4K resolution from Netflix, YouTube and a host of entertainment apps coming soon - all with auto-upscaling for the sharpest picture possible', '479.99', 43, 0, 'img/products/Gaming Consoles/161ae28b2cb524bffd3112281d6c44d5.jpg'),
(49, 'Xbox Series S', 'Introducing the Xbox series S, the smallest, sleekest Xbox console ever. Experience the speed and performance of a next-gen all-digital console at an accessible price point\r\nGo all-digital and enjoy disc-free, next-gen gaming with the smallest Xbox console ever made\r\nExperience next-gen speed and performance with the Xbox velocity architecture, powered by a custom SSD and integrated software\r\nPlay thousands of digital games from four generations of Xbox with backward compatibility, including optimized titles at launch\r\nXbox game Pass ultimate includes over 100 high-quality games, online multiplayer, and an EA play membership for one low monthly price (membership sold separately)', '349.00', 43, 0, 'img/products/Gaming Consoles/375a817304362ba7b50813fd82863be9.jpg'),
(50, 'Xbox One X Cyberpunk 2077 Limited Edition Bundle (1TB)', 'The 1TB limited edition console encapsulates the urban decay and vibrant Tech of night city with glowing elements, bright panels, color shift effects, and textures\r\nGet hands on with Xbox wireless controller Cyberpunk 2077 limited edition featuring a half natural & half Cyber enhancement design based on cult Cyberpunk character Johnny silverhand & his bionic arm\r\nPlay as a mercenary outlaw equipped with cybernetic enhancements in a massive, ever-evolving open world\r\nCustomize your characters cyberware, skill set, and playstyle\r\nWatch 4K Blu-ray movies\r\nStream 4K video on Netflix, Amazon, and YouTube, among others\r\nand listen to music with Spotify', '439.00', 43, 0, 'img/products/Gaming Consoles/70bedb282616e51db466635e0987b236.jpg'),
(51, 'Nintendo Switch with neon red and neon blue Joy‑Con - Version 2 - HAC-001(-01)', 'Play your way with the Nintendo Switch gaming system. Whether you’re at home or on-the-go, solo or with friends, the Nintendo Switch system is designed to fit your life.\r\nDock your Nintendo Switch to enjoy HD gaming on your TV. Heading out? Just undock your console and keep playing in handheld mode\r\nNINTENDO SWITCH REGION FREE BRAND NEW - Product does not have brand warranty and after sales service support as it is not officially launched in India\r\nThis is Version 2 Model which will have extra Brightness and Battery life based on the games we play.', '299.00', 43, 0, 'img/products/Gaming Consoles/7b4abf12eb6b940809ce01ddccdaf40b.jpg'),
(52, 'Nintendo Switch with neon red and neon blue Joy‑Con - Version 2 - HAC-001(-01)', 'Play your way with the Nintendo Switch gaming system. Whether you’re at home or on-the-go, solo or with friends, the Nintendo Switch system is designed to fit your life.\r\nDock your Nintendo Switch to enjoy HD gaming on your TV. Heading out? Just undock your console and keep playing in handheld mode\r\nNINTENDO SWITCH REGION FREE BRAND NEW - Product does not have brand warranty and after sales service support as it is not officially launched in India\r\nThis is Version 2 Model which will have extra Brightness and Battery life based on the games we play.', '299.00', 0, 0, 'img/products/Gaming Consoles/389e6044d5487631c2bc9890ed0d8e84.jpg'),
(53, 'Dualshock 4 Wireless Controller for Playstation 4 - Black V2', 'See even more of your games with the integrated light bar that glows with various colours depending on in-game action - now visible on the touch pad\r\nRock and roll as a highly sensitive built-in accelerometer and gyroscope detect the motion, tilt and rotation of your DualShock 4 wireless controller\r\nBring your games to life and hear every detail with sound effects coming directly from your DualShock 4 wireless controller\r\nEasily programmable : Quickly scroll through every button combination on a compact digital screen and assign them with a single button pres', '39.00', 43, 0, 'img/products/Gaming Consoles/a307feb3e455a470076dbef7eb753fc1.jpg'),
(54, 'Fresh Apple Royal Gala, 4 Pieces Box', 'Apples contain high content of fiber and vitamins in them\r\nApples are used as an ingredient in fruit salads or desserts like custards or else they can be prepared into milk shakes', '1.75', 9, 0, 'img/products/Fruits and Vegetables/7c520835ba710b636ea7ea6d7f9d9e0a.jpg'),
(55, 'Fresh Water Melon - Kiran, 1 Pc', '\r\nContains vibrant pink-red flesh inside the fruit\r\nLow in calories and rich in anti-oxidants\r\nWatermelons have excellent hydrating properties with 90% water content\r\nWeight approx 1500 – 2000 gms', '0.25', 9, 0, 'img/products/Fruits and Vegetables/6c68cbd801d8a12f10e8845adb1b95d1.jpg'),
(56, 'Fresh Apple Royal Gala, 4 Pieces Box', 'About this item\r\nApples contain high content of fiber and vitamins in them\r\nApples are used as an ingredient in fruit salads or desserts like custards or else they can be prepared into milk shakes', '1.99', 44, 0, 'img/products/Fruits/36df706d0576b429b1a99ff0b86fa3c2.jpg'),
(57, 'Fresh Water Melon - Kiran, 1 Pc', 'About this item\r\nContains vibrant pink-red flesh inside the fruit\r\nLow in calories and rich in anti-oxidants\r\nWatermelons have excellent hydrating properties with 90% water content\r\nWeight approx 1500 – 2000 gms', '0.50', 44, 0, 'img/products/Fruits/ccaee1e2299c2e36b8cb13c4926bb8c5.jpg'),
(58, 'Fresh Grapes, Sonaka Seedless, 500 g', 'About this item\r\nFresh, hygienic and natural\r\nRich in Vitamin C, B6, Riboflavin(B2), Phosphorous and Potassium\r\nStore at cool and dry place\r\nSeasonal', '0.99', 44, 0, 'img/products/Fruits/b67187107b4a8a7d98c991590f6fbb59.jpg'),
(59, ' Fresh Guava. 499 GMS', 'This is a Vegetarian product.\r\nFresh, hygienic and natural\r\nGuava is very popular fruit as it boosts energy in the body\r\nRich in Vitamins A,C, folate, fiber and lycopene.\r\nStore ripe guavas under refrigeration\r\nGuava is one of the richest sources of dietary fiber.', '1.99', 44, 0, 'img/products/Fruits/515da58ef8bb7686af2892b8d605cc0e.jpg'),
(60, 'Fresh Produce Banana Amruthapani 500g', 'This is a Vegetarian product.\r\nFood world specification - 15-20 pieces per kg', '0.69', 44, 0, 'img/products/Fruits/8dba3aac9da513db20587711ea7c2459.jpg'),
(61, 'Fresh Kiwi Economy - Iran 3 Pieces', 'A nutritional powerhouse with delicious taste\r\nHigh in vitamin C that can help strengthen your bodies natural defences\r\nDelightfully sweet and juicy in taste', '1.00', 44, 0, 'img/products/Fruits/f161c1ef867e734475657fcd2e51ee2f.jpg'),
(62, 'Fresh Produce Spinach/Palak Leaves 1 Bunch (180g - 200 g)', 'It is densely packed with nutrients High concentration of antioxidants\r\nPalak is rich source of manganese\r\nIt has low fat and calories\r\nNo added fertilizers\r\n', '0.25', 45, 0, 'img/products/Vegetables/3bb7de61cb5ae8c025f878fa352dfc10.jpg'),
(63, 'Fresh Tomato - Local, 1kg', 'About this item\r\n100% Natural\r\nGood source of Vitamin A, C, K, Iron, Folate and Potassium\r\nHelp to reduce Cholesterol\r\nCan be used salads, soups and curries\r\nStore in a cool, dry place away from sunlight', '0.39', 45, 0, 'img/products/Vegetables/80e38d95f9586c8c6aa713a3d1a4be67.jpg'),
(64, 'Fresh Carrot, Orange, 500g', 'About this item\r\nFresh, hygienic and natural\r\nGood source of Vitamin A,E,K, Potassium and Lycopene\r\nCan be used in curries, salad, soups and juices\r\nStore in cool and dry place, away from direct sunlight.', '0.19', 45, 0, 'img/products/Vegetables/75bc91e4399a871c17fc193fd998ad8b.jpg'),
(65, 'Fresh Potato, 1kg', 'High source of fibre\r\nGood source of Vitamin B6, C, Potassium, and Magnesium\r\nCan be used in multiple dishes and snacks\r\nStore at room temperature, away from direct sunlight', '0.59', 45, 0, 'img/products/Vegetables/e5d0719d00af58bb385e62ba51e1987f.jpg'),
(66, 'Fresh Cabbage 1 Piece, (500 - 800 g)', 'About this item\r\n1 pc pack\r\nIt is a good source of Vitamin K, Dietary Fiber, Calicum, Potassium and Phosphorus\r\nIt is also used in the preparation of dry curries, soups, manchurian or salads\r\nStore in cool and dry place, away from direct sunlight.', '0.69', 45, 0, 'img/products/Vegetables/4a65db39b3b82b911bb93274eea657bb.jpg'),
(67, 'Fresh Onion, 1kg', 'Rich in antioxidants\r\nGood source of manganese, copper, Vitamin B6, Vitamin C and Dietary Fibers\r\nCan be used in curries, snacks and salads\r\nStore at room temperature, away from direct sunlight', '0.49', 45, 0, 'img/products/Vegetables/efaf601518e66e889d5f1a53d5898e9e.jpg'),
(68, 'Heritage Uht Milk Pouch, 500 ml', 'About this item\r\nMostly made from buffalo milk', '0.50', 26, 0, 'img/products/Dairy/c2cc21e7ab0e44dab40a2b2c7525b1f2.jpg'),
(69, 'Amul Taza - 1L Pack', 'About this item\r\nAmul Taza\r\n', '1.00', 26, 0, 'img/products/Dairy/e1e944d5d6abee30a4c8d5b325562eb8.jpg'),
(70, 'Amul Butter - Pasteurised, 500g', 'Spread on Bread, Parantha, Roti, Nans, Sandwiches\r\nTopping : Pav Bhaji, Dals, Soups, Salads, Rice\r\nCooking Medium : Butter Paneer Masala, Butter Corn Masala and thousands of delightful recipes\r\nPure vegetarian', '3.00', 26, 0, 'img/products/Dairy/cffa45ab7e45d0f92a8cd38b8c2f7520.jpg'),
(71, 'Amul Cheese - Block, 500g', 'This is a Vegetarian product.\r\nAmul Cheese - Block', '3.49', 26, 0, 'img/products/Dairy/99a8113cf213287cb55b87b7409055f6.jpg'),
(72, 'Heritage Curd - 400g (Buy1Get1)', 'This is a Vegetarian product.\r\nHeritage Curd - 400g Pack', '0.99', 26, 0, 'img/products/Dairy/b0fafddac9f903ff38e433f7206ec413.jpg'),
(73, 'Epigamia Greek Yogurt, Strawberry, 90g', 'This is a Vegetarian product.\r\nLow fat and high protein, delicious and thick Greek yogurt\r\nAll natural', '0.79', 26, 0, 'img/products/Dairy/715603f1941477354c9afb7fc7181947.jpg'),
(74, 'Heritage Paneer Pouch, 200 g', 'This is a Vegetarian product.\r\nA fresh, nutritive product made by coagulating pure milk', '1.19', 26, 0, 'img/products/Dairy/9c13c9b4daa544feb00cf6f7392b8755.jpg'),
(75, 'JERSEY Premium Paneer, 200 g', 'This is a Vegetarian product.\r\nSoft, tasty, rich in protein and energy, ideal for various paneer delicacies\r\nProcessed and packed under hygienic conditions in state-of-the-art plants', '1.39', 26, 0, 'img/products/Dairy/37a6a09199eb215cff7ef24672d63d13.jpg'),
(77, 'The Palace of Illusions', 'The Palace of Illusions takes us back to a time that is half-history, half-myth, and wholly magical; narrated by Panchaali, the wife of the five Pandava brothers, we are - finally - given a woman\'s take on the timeless tale that is the Mahabharata\r\n\r\nTracing Panchaali\'s life - from fiery birth and lonely childhood, where her beloved brother is her only true companion; through her complicated friendship with the enigmatic Krishna; to marriage, motherhood and Panchaali\'s secret attraction to the mysterious man who is her husbands\' most dangerous enemy - The Palace of Illusions is a deeply human novel about a woman born into a man\'s world - a world of warriors, gods and the ever manipulating hands of fate.\r\n\r\n‘A mythic tale brimming with warriors, magic and treachery’ Los Angeles Times\r\n\r\n‘A radiant entree into an ancient mythology . . . Charming and remarkable’ Houston Chronicle\r\n\r\n‘A woman’s look at crime and punishment, loyalty, promises, love and vengeance . . . With The Palace of Illusions, Divakaruni has proven that her storytelling talents put her right up there with the best’ Miami Herald', '9.99', 7, 0, 'img/products/Novels/a1b1180d67a622287ad34f593bfd4722.jpg'),
(78, 'Just Listen : Discover the Secret to Getting Through to Absolutely Anyone Paperback', 'Getting through to someone is a fine art, indeed, but a critical one nonetheless.Whether you are dealing with a harried colleague, a stressed-out client, or an insecure spouse, things will go from bad to worse if you can\'t break through emotional barricades and get your message thoroughly communicated and registered. Drawing on his experience as a psychiatrist, business consultant, and coach, author mark goulston shares simple but powerful techniques readers can use to break through the stubborn and hardened outer layers of co-workers, friends, strangers, or even enemies. Just listen reveals how to: make a powerful and positive first impression listen effectively talk an angry or aggressive person away from an unproductive reaction and toward a more rational mind-set achieve buy-in—the linchpin of all persuasion, negotiation, and sales and more whether you’re dealing with an angry client, a potential customer, or even a friend or family member who isn\'t seeing eye to eye with you, your goal is most likely persuasion. And the first make-or-break step to getting there is having them hear you out. The invaluable principles in just listen will get you through that first tough step with anyone.', '15.99', 7, 0, 'img/products/Novels/4b80133b923d112bbcd88b4df11499e8.jpg'),
(79, 'Radio Silence', 'The second novel by the phenomenally talented Alice Oseman, author of Solitaire and graphic novel series Heartstopper – soon to be a major Netflix series.\r\n\r\nWhat if everything you set yourself up to be was wrong?\r\n\r\nFrances has always been a study machine with one goal, elite university. Nothing will stand in her way; not friends, not a guilty secret – not even the person she is on the inside.\r\n\r\nBut when Frances meets Aled, the shy genius behind her favourite podcast, she discovers a new freedom. He unlocks the door to Real Frances and for the first time she experiences true friendship, unafraid to be herself. Then the podcast goes viral and the fragile trust between them is broken.\r\n\r\nCaught between who she was and who she longs to be, Frances’ dreams come crashing down. Suffocating with guilt, she knows that she has to confront her past…\r\nShe has to confess why Carys disappeared…\r\n\r\nMeanwhile at uni, Aled is alone, fighting even darker secrets.\r\n\r\nIt’s only by facing up to your fears that you can overcome them. And it’s only by being your true self that you can find happiness.\r\n\r\nFrances is going to need every bit of courage she has.\r\n\r\nA YA coming of age read that tackles issues of identity, the pressure to succeed, diversity and freedom to choose, Radio Silence is a tour de force by the most exciting writer of her generation.', '11.99', 7, 0, 'img/products/Novels/6e3a3b3c7a8c020a4b942c4506c11179.jpg'),
(80, 'Call Me By Your Name  (English, Paperback, Aciman Andre)', '\r\nNow a Major Motion Picture from Director Luca Guadagnino, Starring Armie Hammer and Timothee Chalamet, and Written by James Ivory WINNER BEST ADAPTED SCREENPLAY ACADEMY AWARD Nominated for Four Oscars A New York Times Bestseller A USA Today Bestseller A Los Angeles Times Bestseller A Vulture Book Club Pick An Instant Classic and One of the Great Love Stories of Our Time Andre Aciman\'s Call Me by Your Name is the story of a sudden and powerful romance that blossoms between an adolescent boy and a summer guest at his parents\' cliffside mansion on the Italian Riviera. Each is unprepared for the consequences of their attraction, when, during the restless summer weeks, unrelenting currents of obsession, fascination, and desire intensify their passion and test the charged ground between them. Recklessly, the two verge toward the one thing both fear they may never truly find again: total intimacy. It is an instant classic and one of the great love stories of our time.', '25.99', 7, 0, 'img/products/Novels/6d57d9f577b54a119a05b39f371dd227.jpeg'),
(81, 'A Game of Thrones: The Story Continues - The complete boxset of all 7 books', 'HBO’s hit series A GAME OF THRONES is based on George R R Martin’s internationally bestselling series A SONG OF ICE AND FIRE, the greatest fantasy epic of the modern age.\r\n\r\nGeorge R.R. Martin\'s A Song of Ice and Fire series has set the benchmark for contemporary epic fantasy. Labelled by Time magazine as one of the top 100 most influential people in the world, Martin has conjured a world as complex and vibrant as that of J.R.R. Tolkien, populated by a huge cast of fascinating, complex characters, and boasting a history that stretches back twelve thousand years.\r\n\r\nThree great storylines weave through the books, charting the civil war for control of the Seven Kingdoms; the defence of the towering Wall of ice in the uttermost north against the unearthly threat of the Others; and across the Narrow Sea the rise to power of Daenerys Targaryen and the last live dragons in the world.\r\n\r\nA Song of Ice and Fire is the inspiration for HBO’s Game of Thrones, the most-watched TV series of all time.\r\n\r\nThe box set includes:\r\nA GAME OF THRONES\r\nA CLASH OF KINGS\r\nA STORM OF SWORDS, 1: STEEL AND SNOW\r\nA STORM OF SWORDS, 2: BLOOD AND GOLD\r\nA FEAST FOR CROWS\r\nA DANCE WITH DRAGONS, 1: DREAMS AND DUST\r\nA DANCE WITH DRAGONS, 2: AFTER THE FEAST', '89.99', 7, 0, 'img/products/Novels/3fe0f63a33989f2e6df8900f9ee01e42.jpg'),
(82, 'Find Me: A TOP TEN SUNDAY TIMES ', 'Elio believes he has left behind his first love - but as an affair with an older man intensifies, his thoughts turn to the past and to Oliver.\r\n\r\nOliver, a college professor, husband and father, is preparing to leave New York. The imminent trip stirs up longing and regret, awakening an old desire and propelling him towards a decision that could change everything.\r\n\r\nIn Call Me By Your Name, we fell in love with Oliver and Elio. Find Me returns to these unforgettable characters, exploring how love can ripple out from the past and into the future.', '39.99', 7, 0, 'img/products/Novels/22bdbbf5677de1e04e8f0d73017368d9.jpg'),
(83, 'Life 3.0: Being Human in the Age of Artificial Intelligence', 'New York Times Best Seller\r\n\r\nHow will Artificial Intelligence affect crime, war, justice, jobs, society and our very sense of being human? The rise of AI has the potential to transform our future more than any other technology—and there’s nobody better qualified or situated to explore that future than Max Tegmark, an MIT professor who’s helped mainstream research on how to keep AI beneficial.\r\n \r\nHow can we grow our prosperity through automation without leaving people lacking income or purpose? What career advice should we give today’s kids? How can we make future AI systems more robust, so that they do what we want without crashing, malfunctioning or getting hacked? Should we fear an arms race in lethal autonomous weapons? Will machines eventually outsmart us at all tasks, replacing humans on the job market and perhaps altogether? Will AI help life flourish like never before or give us more power than we can handle?\r\n \r\nWhat sort of future do you want? This book empowers you to join what may be the most important conversation of our time. It doesn’t shy away from the full range of viewpoints or from the most controversial issues—from superintelligence to meaning, consciousness and the ultimate physical limits on life in the cosmos.', '19.99', 8, 0, 'img/products/Educative/cf04b3e4fe498e1218685209a1a8de2f.jpg'),
(84, 'Five Minds for the Future', 'We live in a time of relentless change. The only thing that?s certain is that new challenges and opportunities will emerge that are virtually unimaginable today. How can we know which skills will be required to succeed?\r\n\r\nIn Five Minds for the Future, bestselling author Howard Gardner shows how we will each need to master \"five minds\" that the fast-paced future will demand:\r\n\r\n· The disciplined mind, to learn at least one profession, as well as the major thinking (science, math, history, etc.) behind it\r\n\r\n· The synthesizing mind, to organize the massive amounts of information and communicate effectively to others\r\n\r\n· The creating mind, to revel in unasked questions - and uncover new phenomena and insightful apt answers\r\n\r\n· The respectful mind, to appreciate the differences between human beings - and understand and work with all persons\r\n\r\n· The ethical mind, to fulfill one\'s responsibilities as both a worker and a citizen\r\n\r\nWithout these \"minds,\" we risk being overwhelmed by information, unable to succeed in the workplace, and incapable of the judgment needed to thrive both personally and professionally.\r\n\r\nComplete with a substantial new introduction, Five Minds for the Future provides valuable tools for those looking ahead to the next generation of leaders - and for all of us striving to excel in a complex world.\r\n\r\nHoward Gardner—cited by Foreign Policy magazine as one of the one hundred most influential public intellectuals in the world, and a MacArthur Fellowship recipient—is the Hobbs Professor of Cognition and Education at the Harvard Graduate School of Education.', '16.99', 8, 0, 'img/products/Educative/a68f4a4ac0eb4cb781ab3ca8e8514c20.jpg'),
(85, 'Minds Online', 'For the Internet generation, educational technology designed with the brain in mind offers a natural pathway to the pleasures and rewards of deep learning. Drawing on neuroscience and cognitive psychology, Michelle Miller shows how attention, memory, critical thinking, and analytical reasoning can be enhanced through technology-aided approaches', '21.99', 8, 0, 'img/products/Educative/ca4cec55d658293b178921131db3c199.jpg'),
(86, 'Democracy And Education: An Introduction to the Philosophy of Education', 'John Dewey’s Democracy and Education addresses the challenge of providing quality public education in a democratic society. In this classic work Dewey calls for the complete renewal of public education, arguing for the fusion of vocational and contemplative studies in education and for the necessity of universal education for the advancement of self and society. First published in 1916, Democracy and Education is regarded as the seminal work on public education by one of the most important scholars of the century.', '7.99', 8, 0, 'img/products/Educative/10c4d7fdb4181542a0d38e2c64242ceb.jpg');

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
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`dealid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `dealid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
