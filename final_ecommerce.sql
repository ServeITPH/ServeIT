-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 12:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartID` int(5) NOT NULL,
  `transactionID` int(5) NOT NULL,
  `itemID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `isCheckOut` varchar(3) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chatID` int(5) NOT NULL,
  `dateAndTIme` timestamp NOT NULL DEFAULT current_timestamp(),
  `senderID` int(5) NOT NULL,
  `receiverID` int(5) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `attachment` varchar(50) DEFAULT NULL,
  `isRead` varchar(3) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faqsID` int(5) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faqsID`, `question`, `answer`, `category`) VALUES
(1, 'How to buy digital Product?', 'To buy a digital product, go to the navigation bar, browse our product categories, select the item you\'d like to purchase, and click on it to view the product details. From there, you can click \"Add to Cart\" and proceed to checkout to complete your purchase.\n\n', 'Products'),
(2, 'How to add to cart?', 'First, browse our selection and find the item you want to purchase. On the product page, click See More, then click the \"Add to Cart\" button to add the item to your shopping cart. You can continue shopping or proceed to checkout at any time. If you change your mind, you can remove or update items in your cart before completing your purchase.', 'Products'),
(3, 'How often are new products or services added? ', ' We regularly update our website with new digital products and services to keep things fresh. Check back often to explore new additions and updates!', 'Products'),
(5, 'How do I create an account?', 'To create an account, click the \"Sign Up\" button. Enter your details, such as your username, email address, and password, then click \"Sign Up.\" Once your account is created, you can log in and start exploring our products and services.\n\n\n\n\n\n\n\n', 'Accounts'),
(6, 'What payment methods do you accept?', 'We accept various payment methods, including GCash and cash on delivery. All transactions are encrypted to ensure your security and privacy.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Payments'),
(8, 'How will I receive the services I purchased?', 'Once your purchase is confirmed, we will send the item to your email, along with details about the service or product and the next steps.', 'Services'),
(9, 'How often are new products or services added?', '\r\nWe regularly update our website with new digital products and services. Subscribe to our newsletter or follow us on social media to stay informed about the latest additions.', 'Products'),
(10, 'How soon can I access my purchased digital product?\r\n', 'You can access your purchased digital product immediately after your payment is successfully processed. Once the transaction is complete, a confirmation email will be sent to your registered email address containing a download link and access instructions.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Payments'),
(11, 'What if i want to cancel my service?', 'You can message us directly to disclose any disputes or questions that may arise with our services. We will reply ASAP to help you with your requests.', 'Payments');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(5) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `type` varchar(7) NOT NULL,
  `categoryName` varchar(50) DEFAULT NULL,
  `shortDescription` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `title`, `description`, `price`, `attachment`, `type`, `categoryName`, `shortDescription`) VALUES
(1, 'Custom wall art designs', 'Unique custom wall art designs to fit any space or style.', 100, '0001.jpg', 'product', 'Digital Art & Printables', 'Personalized wall art'),
(2, 'Minimalist line art prints', 'Sleek and modern minimalist line art prints for a contemporary touch.', 50, '0002.jpg', 'product', 'Digital Art & Printables', 'Simple and elegant line art'),
(3, 'Motivational quote posters', 'Inspirational quote posters to uplift and motivate.', 25, '0003.jpg', 'product', 'Digital Art & Printables', 'Uplifting and motivating posters'),
(4, 'Digital watercolor portraits', 'Custom watercolor portraits created digitally for a unique artistic touch.', 150, '0004.jpg', 'product', 'Digital Art & Printables', 'Custom digital portraits'),
(5, 'Abstract art prints', 'Vibrant and expressive abstract art prints for modern spaces.', 75, '0005.jpg', 'product', 'Digital Art & Printables', 'Bold abstract art'),
(6, 'Personalized family tree illustrations', 'Custom family tree illustrations to celebrate heritage and family bonds.', 120, '0006.jpg', 'product', 'Digital Art & Printables', 'Custom family tree artwork'),
(7, 'Printable calendars (yearly/monthly)', 'Printable calendars for both yearly and monthly planning needs.', 10, '0007.jpg', 'product', 'Digital Art & Printables', 'Printable planner calendars'),
(8, 'Kids’ educational posters (alphabet, numbers)', 'Educational posters for kids featuring the alphabet, numbers, and more.', 15, '0008.jpg', 'product', 'Digital Art & Printables', 'Educational posters for kids'),
(9, 'DIY origami templates', 'Step-by-step DIY origami templates for creating intricate paper designs.', 5, '0009.jpg', 'product', 'Digital Art & Printables', 'Origami templates for beginners'),
(10, 'Greeting card designs', 'Custom greeting card designs for all occasions.', 20, '0010.jpg', 'product', 'Digital Art & Printables', 'Custom greeting cards'),
(11, 'Wedding invitation templates', 'Elegant wedding invitation templates to suit any theme.', 30, '0011.jpg', 'product', 'Digital Art & Printables', 'Stylish wedding invitations'),
(12, 'Party decor kits (banners, cupcake toppers)', 'Fun and festive party decor kits with banners and cupcake toppers.', 40, '0012.jpg', 'product', 'Digital Art & Printables', 'Party decoration kits'),
(13, 'Vision board templates', 'Vision board templates to help manifest your goals and dreams.', 10, '0013.jpg', 'product', 'Digital Art & Printables', 'Templates for vision boards'),
(14, 'Daily planner pages', 'Printable daily planner pages to organize your day efficiently.', 8, '0014.jpg', 'product', 'Digital Art & Printables', 'Daily planner templates'),
(15, 'Holiday-themed wall art', 'Festive wall art designs for different holidays throughout the year.', 50, '0015.jpg', 'product', 'Digital Art & Printables', 'Holiday-themed artwork'),
(16, 'Baby milestone cards', 'Cute milestone cards to document your baby\'s special moments.', 15, '0016.jpg', 'product', 'Digital Art & Printables', 'Baby milestone cards'),
(17, 'Zodiac-themed art prints', 'Art prints featuring zodiac signs and their symbolism.', 40, '0017.jpg', 'product', 'Digital Art & Printables', 'Zodiac sign artwork'),
(18, 'Digital scrapbook papers', 'Beautiful digital scrapbook papers to make your projects stand out.', 10, '0018.jpg', 'product', 'Digital Art & Printables', 'Scrapbook paper designs'),
(19, 'Printable recipe cards', 'Printable recipe cards to organize your favorite dishes.', 5, '0019.jpg', 'product', 'Digital Art & Printables', 'Recipe card templates'),
(20, 'Journaling stickers', 'Decorative stickers for adding flair to your journal entries.', 12, '0020.jpg', 'product', 'Digital Art & Printables', 'Stickers for journaling'),
(21, 'Canva templates for Instagram posts/stories', 'Ready-to-use Canva templates for creating eye-catching Instagram posts and stories.', 25, '0021.jpg', 'product', 'Templates & Productivity Tools', 'Instagram post & story templates'),
(22, 'Resume and CV templates', 'Professional resume and CV templates to help you land your dream job.', 15, '0022.jpg', 'product', 'Templates & Productivity Tools', 'Resume & CV templates'),
(23, 'Business card designs', 'Customizable business card designs to make a lasting first impression.', 20, '0023.jpg', 'product', 'Templates & Productivity Tools', 'Business card templates'),
(24, 'Invoice and receipt templates', 'Professional invoice and receipt templates for efficient business transactions.', 10, '0024.jpg', 'product', 'Templates & Productivity Tools', 'Invoice & receipt templates'),
(25, 'Weekly meal planners', 'Printable weekly meal planners to organize your meals and grocery list.', 8, '0025.jpg', 'product', 'Templates & Productivity Tools', 'Weekly meal planning templates'),
(26, 'Budget tracking spreadsheets', 'Easy-to-use budget tracking spreadsheets to manage your finances.', 12, '0026.jpg', 'product', 'Templates & Productivity Tools', 'Budget tracking spreadsheets'),
(27, 'Content calendar templates', 'Content calendar templates to help plan and organize your content strategy.', 18, '0027.jpg', 'product', 'Templates & Productivity Tools', 'Content planning templates'),
(28, 'Email signature templates', 'Professional email signature templates to make your emails stand out.', 5, '0028.jpg', 'product', 'Templates & Productivity Tools', 'Email signature templates'),
(29, 'E-book design layouts', 'Beautiful e-book design layouts for creating professional digital books.', 35, '0029.jpg', 'product', 'Templates & Productivity Tools', 'E-book design layouts'),
(30, 'Media kit templates for influencers', 'Customizable media kit templates for influencers to showcase their brand.', 25, '0030.jpg', 'product', 'Templates & Productivity Tools', 'Influencer media kit templates'),
(31, 'Digital wedding planners', 'A comprehensive digital wedding planner template to organize your big day.', 30, '0031.jpg', 'product', 'Templates & Productivity Tools', 'Digital wedding planning tools'),
(32, 'Travel itinerary planners', 'Plan your perfect trip with printable travel itinerary templates.', 12, '0032.jpg', 'product', 'Templates & Productivity Tools', 'Travel itinerary templates'),
(33, 'Minimalist PowerPoint presentation templates', 'Sleek and professional minimalist PowerPoint presentation templates.', 20, '0033.jpg', 'product', 'Templates & Productivity Tools', 'Minimalist PowerPoint templates'),
(34, 'Social media strategy guides', 'Comprehensive social media strategy guides to improve your online presence.', 15, '0034.jpg', 'product', 'Templates & Productivity Tools', 'Social media strategy guides'),
(35, 'Branding kits (logos, color palettes)', 'Complete branding kits including logos and color palettes for your business.', 40, '0035.jpg', 'product', 'Templates & Productivity Tools', 'Complete branding kits'),
(36, 'Workout tracker spreadsheets', 'Track your fitness progress with easy-to-use workout tracker spreadsheets.', 8, '0036.jpg', 'product', 'Templates & Productivity Tools', 'Workout tracking spreadsheets'),
(37, 'Habit tracker printables', 'Printable habit trackers to help you build and maintain good habits.', 5, '0037.jpg', 'product', 'Templates & Productivity Tools', 'Printable habit trackers'),
(38, 'Blog post planner templates', 'Plan and organize your blog content with blog post planner templates.', 10, '0038.jpg', 'product', 'Templates & Productivity Tools', 'Blog content planning templates'),
(39, 'Study planners for students', 'Study planners designed specifically for students to organize their learning schedule.', 8, '0039.jpg', 'product', 'Templates & Productivity Tools', 'Student study planners'),
(40, 'Customizable digital journals', 'Personalized digital journals for tracking thoughts, ideas, and goals.', 20, '0040.jpg', 'product', 'Templates & Productivity Tools', 'Customizable digital journals'),
(41, 'Language learning flashcards', 'Printable flashcards for learning new languages effectively.', 12, '0041.jpg', 'product', 'Digital Courses & Educational Materials', 'Language learning flashcards'),
(42, 'Step-by-step knitting patterns', 'Detailed knitting patterns for creating cozy scarves, blankets, and more.', 10, '0042.jpg', 'product', 'Digital Courses & Educational Materials', 'Knitting patterns'),
(43, 'Calligraphy practice sheets', 'Printable practice sheets for mastering calligraphy and hand lettering.', 8, '0043.jpg', 'product', 'Digital Courses & Educational Materials', 'Calligraphy practice sheets'),
(44, 'Watercolor painting tutorials', 'Step-by-step watercolor painting tutorials for beginners and advanced artists.', 15, '0044.jpg', 'product', 'Digital Courses & Educational Materials', 'Watercolor painting tutorials'),
(45, 'Photography cheat sheets', 'Essential photography cheat sheets for improving your camera skills.', 10, '0045.jpg', 'product', 'Digital Courses & Educational Materials', 'Photography cheat sheets'),
(46, 'Digital drawing tutorials (Procreate, Photoshop)', 'Learn digital drawing techniques with tutorials for Procreate and Photoshop.', 20, '0046.jpg', 'product', 'Digital Courses & Educational Materials', 'Digital drawing tutorials'),
(47, 'Video editing guides', 'Comprehensive video editing guides for beginners and professionals.', 18, '0047.jpg', 'product', 'Digital Courses & Educational Materials', 'Video editing guides'),
(48, 'Podcasting starter kits', 'Everything you need to start your own podcast, including equipment guides and tips.', 25, '0048.jpg', 'product', 'Digital Courses & Educational Materials', 'Podcasting starter kits'),
(49, 'Sewing patterns for beginners', 'Beginner-friendly sewing patterns for creating simple and stylish garments.', 12, '0049.jpg', 'product', 'Digital Courses & Educational Materials', 'Sewing patterns for beginners'),
(50, 'Music sheet arrangements', 'Custom music sheet arrangements for different instruments and genres.', 18, '0050.jpg', 'product', 'Digital Courses & Educational Materials', 'Music sheet arrangements'),
(51, 'Crochet patterns (scarves, plush toys)', 'Easy crochet patterns for making scarves, plush toys, and more.', 10, '0051.jpg', 'product', 'Digital Courses & Educational Materials', 'Crochet patterns'),
(52, 'How-to guides for starting a small business', 'Comprehensive guides on how to start and manage a small business.', 30, '0052.jpg', 'product', 'Digital Courses & Educational Materials', 'Business startup guides'),
(53, 'Customizable teacher resources (worksheets, tests)', 'Editable teacher resources, including worksheets and tests for all grade levels.', 18, '0053.jpg', 'product', 'Digital Courses & Educational Materials', 'Customizable teacher resources'),
(54, 'Yoga pose charts', 'Yoga pose charts to help beginners and experienced practitioners improve their practice.', 12, '0054.jpg', 'product', 'Digital Courses & Educational Materials', 'Yoga pose charts'),
(55, 'Meditation guides and audio files', 'Guided meditation sessions and audio files for stress relief and mindfulness.', 15, '0055.jpg', 'product', 'Digital Courses & Educational Materials', 'Meditation guides & audio'),
(56, 'Creative writing prompts', 'Inspiring creative writing prompts to help you get started with writing.', 8, '0056.jpg', 'product', 'Digital Courses & Educational Materials', 'Creative writing prompts'),
(57, 'Guitar chord charts', 'Guitar chord charts for beginners and advanced players to improve their skills.', 6, '0057.jpg', 'product', 'Digital Courses & Educational Materials', 'Guitar chord charts'),
(58, 'STEM activity kits for kids', 'Fun and educational STEM activity kits for kids to learn science, technology, engineering, and math.', 20, '0058.jpg', 'product', 'Digital Courses & Educational Materials', 'STEM activity kits'),
(59, 'Cake decorating tutorials', 'Step-by-step cake decorating tutorials for creating beautiful cakes and desserts.', 18, '0059.jpg', 'product', 'Digital Courses & Educational Materials', 'Cake decorating tutorials'),
(60, 'Wedding planning spreadsheets', 'Organized spreadsheets for planning every aspect of your wedding from start to finish.', 15, '0060.jpg', 'product', 'Digital Courses & Educational Materials', 'Wedding planning spreadsheets'),
(61, 'Printable scrapbooking kits', 'Complete scrapbooking kits with printable elements for crafting your memories.', 15, '0061.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable scrapbooking kits'),
(62, 'SVG files for Cricut and Silhouette cutting machin', 'Downloadable SVG files for use with Cricut and Silhouette cutting machines for crafting projects.', 10, '0062.jpg', 'product', 'Digital Crafting & DIY Projects', 'SVG files for Cricut and Silhouette'),
(63, 'DIY greeting card templates', 'Customizable DIY greeting card templates for any occasion.', 8, '0063.jpg', 'product', 'Digital Crafting & DIY Projects', 'DIY greeting card templates'),
(64, 'Embroidery pattern designs', 'Unique embroidery patterns to create beautiful designs on fabric.', 12, '0064.jpg', 'product', 'Digital Crafting & DIY Projects', 'Embroidery pattern designs'),
(65, 'Printable planner stickers', 'Printable planner stickers to decorate your planners and stay organized.', 6, '0065.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable planner stickers'),
(66, 'Digital scrapbooking elements (frames, tags, embel', 'Various digital scrapbooking elements like frames, tags, and embellishments.', 10, '0066.jpg', 'product', 'Digital Crafting & DIY Projects', 'Digital scrapbooking elements'),
(67, 'DIY wedding favor labels', 'Personalized labels for DIY wedding favors, perfect for special events.', 8, '0067.jpg', 'product', 'Digital Crafting & DIY Projects', 'DIY wedding favor labels'),
(68, 'Printable party decorations (balloon garlands, ban', 'Printable party decorations, including balloon garlands, banners, and more.', 12, '0068.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable party decorations'),
(69, 'Origami paper folding templates', 'Easy-to-follow origami paper folding templates for crafting beautiful shapes.', 5, '0069.jpg', 'product', 'Digital Crafting & DIY Projects', 'Origami paper folding templates'),
(70, 'Printable 3D paper models', 'Downloadable 3D paper models that you can print and assemble.', 15, '0070.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable 3D paper models'),
(71, 'Printable gift tags', 'Personalized printable gift tags for any occasion.', 4, '0071.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable gift tags'),
(72, 'Knitting and crochet pattern designs', 'Knitting and crochet patterns for making stylish and cozy items.', 10, '0072.jpg', 'product', 'Digital Crafting & DIY Projects', 'Knitting and crochet patterns'),
(73, 'Quilt block patterns', 'Downloadable quilt block patterns for creating beautiful quilts.', 12, '0073.jpg', 'product', 'Digital Crafting & DIY Projects', 'Quilt block patterns'),
(74, 'Printable labels for jars and containers', 'Custom printable labels for jars, containers, and storage items.', 5, '0074.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable labels for jars'),
(75, 'Printable stencils for home decor projects', 'Downloadable stencils for home decor projects like wall art and furniture.', 10, '0075.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable stencils'),
(76, 'DIY candle-making guides', 'Step-by-step guides for making your own candles at home.', 7, '0076.jpg', 'product', 'Digital Crafting & DIY Projects', 'DIY candle-making guides'),
(77, 'Printable bookmarks for reading', 'Cute and customizable printable bookmarks for your reading adventures.', 3, '0077.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable bookmarks'),
(78, 'DIY jewelry-making tutorials and patterns', 'Detailed tutorials and patterns for making your own jewelry pieces.', 15, '0078.jpg', 'product', 'Digital Crafting & DIY Projects', 'DIY jewelry-making tutorials'),
(79, 'Printable scrapbook journaling cards', 'Printable journaling cards for scrapbooking and memory keeping.', 6, '0079.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable scrapbook journaling cards'),
(80, 'Printable stencil designs for home crafting', 'Stencil designs for various home crafting projects.', 8, '0080.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable stencil designs'),
(81, 'Digital designs for custom tattoos', 'Custom tattoo designs available for download and printing.', 20, '0081.jpg', 'product', 'Digital Crafting & DIY Projects', 'Custom tattoo designs'),
(82, 'Printable embroidery stitch guides', 'Guides for learning and perfecting embroidery stitches.', 7, '0082.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable embroidery stitch guides'),
(83, 'DIY wooden sign templates', 'Templates for creating personalized wooden signs for home or events.', 10, '0083.jpg', 'product', 'Digital Crafting & DIY Projects', 'DIY wooden sign templates'),
(84, 'Printable sewing patterns (bags, accessories)', 'Printable sewing patterns for creating bags, accessories, and more.', 12, '0084.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable sewing patterns'),
(85, 'Custom t-shirt design files for printing', 'Design files for creating custom t-shirts using print-on-demand services.', 15, '0085.jpg', 'product', 'Digital Crafting & DIY Projects', 'Custom t-shirt designs'),
(86, 'Digital craft supplies inventory sheets', 'Digital inventory sheets to keep track of your craft supplies.', 5, '0086.jpg', 'product', 'Digital Crafting & DIY Projects', 'Craft supplies inventory sheets'),
(87, 'Printable thank-you cards for gifts', 'Printable thank-you cards to show appreciation for gifts.', 4, '0087.jpg', 'product', 'Digital Crafting & DIY Projects', 'Printable thank-you cards'),
(88, 'Paper flower templates for crafts', 'Templates for creating beautiful paper flowers for decorations and crafts.', 6, '0088.jpg', 'product', 'Digital Crafting & DIY Projects', 'Paper flower templates'),
(89, 'DIY home decor projects with printable designs', 'Printable designs for creating your own DIY home decor projects.', 18, '0089.jpg', 'product', 'Digital Crafting & DIY Projects', 'DIY home decor projects'),
(90, 'Digital templates for personalized puzzles', 'Customizable digital templates for creating personalized puzzles.', 12, '0090.jpg', 'product', 'Digital Crafting & DIY Projects', 'Personalized puzzle templates'),
(91, 'Online Language Tutoring', 'One-on-one online language lessons with native speakers.', 25, '0091.jpg', 'service', '', 'Online language tutoring'),
(92, 'Virtual Fitness Coaching', 'Personalized fitness coaching with expert trainers via video calls.', 50, '0092.jpg', 'service', '', 'Virtual fitness coaching'),
(93, 'SEO Optimization Services', 'Professional SEO services to boost your website’s ranking on search engines.', 200, '0093.jpg', 'service', '', 'SEO optimization'),
(94, 'Graphic Design Services', 'Custom graphic design for logos, branding, and marketing materials.', 150, '0094.jpg', 'service', '', 'Graphic design services'),
(95, 'Web Development Services', 'Custom web development services for building responsive websites and applications.', 500, '0095.jpg', 'service', '', 'Web development'),
(96, 'Resume Writing Service', 'Professional resume writing services to help you land your dream job.', 75, '0096.jpg', 'service', '', 'Resume writing service'),
(97, 'Virtual Assistant Services', 'Get support with administrative tasks from a virtual assistant.', 20, '0097.jpg', 'service', '', 'Virtual assistant services'),
(98, 'Online Cooking Classes', 'Learn to cook from professional chefs with interactive online classes.', 30, '0098.jpg', 'service', '', 'Online cooking classes'),
(99, 'Social Media Management', 'Social media management and content creation to boost your online presence.', 250, '0099.jpg', 'service', '', 'Social media management'),
(100, 'Photography Editing Service', 'Professional photo editing services for personal and commercial use.', 50, '0100.jpg', 'service', '', 'Photography editing');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratingID` int(5) NOT NULL,
  `transactionID` int(5) DEFAULT NULL,
  `itemID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `ratingValue` int(1) NOT NULL,
  `review` varchar(200) NOT NULL,
  `dateTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratingID`, `transactionID`, `itemID`, `userID`, `ratingValue`, `review`, `dateTime`) VALUES
(1, NULL, 1, 2, 5, 'Perfect design, easy to download and print.', '2025-01-24'),
(2, NULL, 1, 3, 4, 'Great design, but could be more vibrant.', '2025-01-24'),
(3, NULL, 2, 4, 5, 'Love it! Easy to download and print.', '2025-01-24'),
(4, NULL, 2, 5, 4, 'Modern design, but tricky to adjust for frame.', '2025-01-24'),
(5, NULL, 3, 6, 5, 'Great poster, adds positive vibes.', '2025-01-24'),
(6, NULL, 3, 7, 3, 'Good poster, but low resolution for large prints.', '2025-01-24'),
(7, NULL, 4, 8, 5, 'Perfect family portrait, easy to print.', '2025-01-24'),
(8, NULL, 4, 9, 5, 'High quality portrait, no issues.', '2025-01-24'),
(9, NULL, 5, 10, 4, 'Vibrant art, but colors didn’t match my expectations.', '2025-01-24'),
(10, NULL, 5, 11, 5, 'Fantastic print, great quality.', '2025-01-24'),
(11, NULL, 6, 1, 5, 'Beautiful family tree, highly customizable.', '2025-01-24'),
(12, NULL, 6, 2, 4, 'Good artwork, needed color adjustments.', '2025-01-24'),
(13, NULL, 7, 3, 4, 'Helpful, but tricky to adjust format.', '2025-01-24'),
(14, NULL, 7, 4, 5, 'Love the calendar, so useful.', '2025-01-24'),
(15, NULL, 8, 5, 5, 'Great educational posters, quick download.', '2025-01-24'),
(16, NULL, 8, 6, 4, 'Good quality, more interactivity would be nice.', '2025-01-24'),
(17, NULL, 9, 7, 5, 'Great templates, easy to use.', '2025-01-24'),
(18, NULL, 9, 8, 3, 'Decent templates, steps could be clearer.', '2025-01-24'),
(19, NULL, 10, 9, 5, 'Perfect designs for my event.', '2025-01-24'),
(20, NULL, 10, 10, 4, 'Good designs, wanted more themes.', '2025-01-24'),
(21, NULL, 11, 11, 5, 'Easy to use, stunning invites.', '2025-01-24'),
(22, NULL, 11, 1, 3, 'Nice design, but needed editing in Canva.', '2025-01-24'),
(23, NULL, 12, 2, 5, 'Perfect for my party, easy to edit.', '2025-01-24'),
(24, NULL, 12, 3, 4, 'Great kit, resizing was tricky.', '2025-01-24'),
(25, NULL, 13, 4, 5, 'Inspiring templates, easy to use.', '2025-01-24'),
(26, 126, 13, 27, 3, 'The templates were nice, but it didn’t provide enough customization options for what I needed.', '2025-01-24'),
(27, 127, 14, 28, 5, 'The daily planner pages have been a game changer for my productivity. Super easy to use and print.', '2025-01-24'),
(28, 128, 14, 29, 4, 'The daily planner is great but could include more customizable sections in the digital version.', '2025-01-24'),
(29, 129, 15, 30, 5, 'Holiday-themed wall art was amazing! The download was fast, and the print quality was perfect.', '2025-01-24'),
(30, 130, 15, 31, 4, 'The holiday-themed design is lovely, though I was hoping for a higher resolution image for larger prints.', '2025-01-24'),
(31, 131, 16, 32, 5, 'The baby milestone cards were so cute and easy to download. I’m using them for my baby’s scrapbook!', '2025-01-24'),
(32, 132, 16, 33, 4, 'The cards are adorable, but I would love it if they were available in more formats for different printers.', '2025-01-24'),
(33, 133, 17, 34, 5, 'The zodiac-themed art prints were so detailed and beautiful. I can’t wait to frame them!', '2025-01-24'),
(34, 134, 17, 35, 4, 'Great quality but a bit more variety in designs would be nice for other zodiac signs.', '2025-01-24'),
(35, 135, 18, 36, 5, 'The digital scrapbook papers are gorgeous and made my scrapbook projects look amazing.', '2025-01-24'),
(36, 136, 18, 37, 3, 'The scrapbook papers are nice, but I was expecting a larger variety in the pack.', '2025-01-24'),
(37, 137, 19, 38, 5, 'These printable recipe cards are perfect for organizing my favorite recipes. Downloading was quick.', '2025-01-24'),
(38, 138, 19, 39, 4, 'The recipe cards are great, but I would love a few more design options to choose from.', '2025-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` int(11) NOT NULL,
  `providerID` int(11) NOT NULL,
  `consumerID` int(11) NOT NULL,
  `transactionDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(20) NOT NULL,
  `paymentStatus` varchar(15) NOT NULL DEFAULT 'PENDING',
  `referenceNumber` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profilePicture` varchar(50) NOT NULL DEFAULT 'default.png',
  `accountDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `phoneNumber` varchar(20) DEFAULT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `profilePicture`, `accountDate`, `phoneNumber`, `role`) VALUES
(1, 'admin', 'carlos.m@example.com', 'admin', 'default.png', '2025-01-23 16:00:00', '0917-123-4567', 'admin'),
(2, 'JoseManalo', 'jose.manalo@example.com', '1234', 'default.png', '2025-01-21 16:00:00', '0917-234-5678', 'user'),
(3, 'AnnaParedes', 'anna.paredes@example.com', '1234', 'default.png', '2025-01-22 16:00:00', '0917-345-6789', 'user'),
(4, 'MariaSantos', 'maria.santos@example.com', '1234', 'default.png', '2025-01-19 16:00:00', '0917-456-7890', 'user'),
(5, 'RafaelLopez', 'rafael.lopez@example.com', '1234', 'default.png', '2025-01-18 16:00:00', '0917-567-8901', 'user'),
(6, 'MiaReyes', 'mia.reyes@example.com', '1234', 'default.png', '2025-01-17 16:00:00', '0917-678-9012', 'user'),
(7, 'LiamDelaCruz', 'liam.delacruz@example.com', '1234', 'default.png', '2025-01-16 16:00:00', '0917-789-0123', 'user'),
(8, 'JasminBautista', 'jasmin.bautista@example.com', '1234', 'default.png', '2025-01-15 16:00:00', '0917-890-1234', 'user'),
(9, 'MarcoGutierrez', 'marco.gutierrez@example.com', '1234', 'default.png', '2025-01-14 16:00:00', '0917-901-2345', 'user'),
(10, 'IsabelMendoza', 'isabel.mendoza@example.com', '1234', 'default.png', '2025-01-13 16:00:00', '0917-012-3456', 'user'),
(11, 'PaoloGonzales', 'paolo.gonzales@example.com', '1234', 'default.png', '2025-01-12 16:00:00', '0917-123-7654', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `visitID` int(80) NOT NULL,
  `page` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`visitID`, `page`) VALUES
(1, 'HOME'),
(2, 'PRODUCTS'),
(3, 'SERVICES'),
(4, 'ABOUT'),
(5, 'HELP CENTER'),
(6, 'HOME'),
(7, 'PRODUCTS'),
(8, 'SERVICES'),
(9, 'ABOUT'),
(10, 'HELP CENTER'),
(11, 'HOME'),
(12, 'PRODUCTS'),
(13, 'SERVICES'),
(14, 'ABOUT'),
(15, 'HELP CENTER'),
(16, 'HOME'),
(17, 'PRODUCTS'),
(18, 'SERVICES'),
(19, 'ABOUT'),
(20, 'HELP CENTER'),
(21, 'HOME'),
(22, 'PRODUCTS'),
(23, 'SERVICES'),
(24, 'ABOUT'),
(25, 'HELP CENTER'),
(26, 'HOME'),
(27, 'PRODUCTS'),
(28, 'SERVICES'),
(29, 'ABOUT'),
(30, 'HELP CENTER'),
(31, 'HOME'),
(32, 'PRODUCTS'),
(33, 'SERVICES'),
(34, 'ABOUT'),
(35, 'HELP CENTER'),
(36, 'HOME'),
(37, 'PRODUCTS'),
(38, 'SERVICES'),
(39, 'ABOUT'),
(40, 'HELP CENTER'),
(41, 'HOME'),
(42, 'PRODUCTS'),
(43, 'SERVICES'),
(44, 'ABOUT'),
(45, 'HELP CENTER'),
(46, 'HOME'),
(47, 'PRODUCTS'),
(48, 'SERVICES'),
(49, 'ABOUT'),
(50, 'HELP CENTER'),
(51, 'HOME'),
(52, 'PRODUCTS'),
(53, 'SERVICES'),
(54, 'ABOUT'),
(55, 'HELP CENTER'),
(56, 'HOME'),
(57, 'PRODUCTS'),
(58, 'SERVICES'),
(59, 'ABOUT'),
(60, 'HELP CENTER'),
(61, 'HOME'),
(62, 'PRODUCTS'),
(63, 'SERVICES'),
(64, 'ABOUT'),
(65, 'HELP CENTER'),
(66, 'HOME'),
(67, 'PRODUCTS'),
(68, 'SERVICES'),
(69, 'ABOUT'),
(70, 'HELP CENTER'),
(71, 'HOME'),
(72, 'PRODUCTS'),
(73, 'SERVICES'),
(74, 'ABOUT'),
(75, 'HELP CENTER'),
(76, 'HOME'),
(77, 'PRODUCTS'),
(78, 'SERVICES'),
(79, 'ABOUT'),
(80, 'HELP CENTER'),
(81, 'HOME'),
(82, 'PRODUCTS'),
(83, 'SERVICES'),
(84, 'ABOUT'),
(85, 'HELP CENTER'),
(86, 'HOME'),
(87, 'PRODUCTS'),
(88, 'SERVICES'),
(89, 'ABOUT'),
(90, 'HELP CENTER'),
(91, 'HOME'),
(92, 'PRODUCTS'),
(93, 'SERVICES'),
(94, 'ABOUT'),
(95, 'HELP CENTER'),
(96, 'HOME'),
(97, 'PRODUCTS'),
(98, 'SERVICES'),
(99, 'ABOUT'),
(100, 'HELP CENTER'),
(101, 'HOME'),
(102, 'PRODUCTS'),
(103, 'SERVICES'),
(104, 'ABOUT'),
(105, 'HELP CENTER'),
(106, 'HOME'),
(107, 'PRODUCTS'),
(108, 'SERVICES'),
(109, 'ABOUT'),
(110, 'HELP CENTER'),
(111, 'HOME'),
(112, 'PRODUCTS'),
(113, 'SERVICES'),
(114, 'ABOUT'),
(115, 'HELP CENTER'),
(116, 'HOME'),
(117, 'PRODUCTS'),
(118, 'SERVICES'),
(119, 'ABOUT'),
(120, 'HELP CENTER'),
(121, 'HOME'),
(122, 'PRODUCTS'),
(123, 'SERVICES'),
(124, 'ABOUT'),
(125, 'HELP CENTER'),
(126, 'HOME'),
(127, 'PRODUCTS'),
(128, 'SERVICES'),
(129, 'ABOUT'),
(130, 'HELP CENTER'),
(131, 'HOME'),
(132, 'PRODUCTS'),
(133, 'SERVICES'),
(134, 'ABOUT'),
(135, 'HELP CENTER'),
(136, 'HOME'),
(137, 'PRODUCTS'),
(138, 'SERVICES'),
(139, 'ABOUT'),
(140, 'HELP CENTER'),
(141, 'HOME'),
(142, 'PRODUCTS'),
(143, 'SERVICES'),
(144, 'ABOUT'),
(145, 'HELP CENTER'),
(146, 'HOME'),
(147, 'PRODUCTS'),
(148, 'SERVICES'),
(149, 'ABOUT'),
(150, 'HELP CENTER'),
(151, 'HOME'),
(152, 'PRODUCTS'),
(153, 'SERVICES'),
(154, 'ABOUT'),
(155, 'HELP CENTER'),
(156, 'HOME'),
(157, 'PRODUCTS'),
(158, 'SERVICES'),
(159, 'ABOUT'),
(160, 'HELP CENTER'),
(161, 'HOME'),
(162, 'PRODUCTS'),
(163, 'SERVICES'),
(164, 'ABOUT'),
(165, 'HELP CENTER'),
(166, 'HOME'),
(167, 'PRODUCTS'),
(168, 'SERVICES'),
(169, 'ABOUT'),
(170, 'HELP CENTER'),
(171, 'HOME'),
(172, 'PRODUCTS'),
(173, 'SERVICES'),
(174, 'ABOUT'),
(175, 'HELP CENTER'),
(176, 'HOME'),
(177, 'PRODUCTS'),
(178, 'SERVICES'),
(179, 'ABOUT'),
(180, 'HELP CENTER'),
(181, 'HOME'),
(182, 'PRODUCTS'),
(183, 'SERVICES'),
(184, 'ABOUT'),
(185, 'HELP CENTER'),
(186, 'HOME'),
(187, 'PRODUCTS'),
(188, 'SERVICES'),
(189, 'ABOUT'),
(190, 'HELP CENTER'),
(191, 'HOME'),
(192, 'PRODUCTS'),
(193, 'SERVICES'),
(194, 'ABOUT'),
(195, 'HELP CENTER'),
(196, 'HOME'),
(197, 'PRODUCTS'),
(198, 'SERVICES'),
(199, 'ABOUT'),
(200, 'HELP CENTER'),
(201, 'HOME'),
(202, 'PRODUCTS'),
(203, 'SERVICES'),
(204, 'ABOUT'),
(205, 'HELP CENTER'),
(206, 'HOME'),
(207, 'PRODUCTS'),
(208, 'SERVICES'),
(209, 'ABOUT'),
(210, 'HELP CENTER'),
(211, 'HOME'),
(212, 'PRODUCTS'),
(213, 'SERVICES'),
(214, 'ABOUT'),
(215, 'HELP CENTER'),
(216, 'HOME'),
(217, 'PRODUCTS'),
(218, 'SERVICES'),
(219, 'ABOUT'),
(220, 'HELP CENTER'),
(221, 'HOME'),
(222, 'PRODUCTS'),
(223, 'SERVICES'),
(224, 'ABOUT'),
(225, 'HELP CENTER'),
(226, 'HOME'),
(227, 'PRODUCTS'),
(228, 'SERVICES'),
(229, 'ABOUT'),
(230, 'HELP CENTER'),
(231, 'HOME'),
(232, 'PRODUCTS'),
(233, 'SERVICES'),
(234, 'ABOUT'),
(235, 'HELP CENTER'),
(236, 'HOME'),
(237, 'PRODUCTS'),
(238, 'SERVICES'),
(239, 'ABOUT'),
(240, 'HELP CENTER'),
(241, 'HOME'),
(242, 'PRODUCTS'),
(243, 'SERVICES'),
(244, 'ABOUT'),
(245, 'HELP CENTER'),
(246, 'HOME'),
(247, 'PRODUCTS'),
(248, 'SERVICES'),
(249, 'ABOUT'),
(250, 'HELP CENTER'),
(251, 'HOME'),
(252, 'PRODUCTS'),
(253, 'SERVICES'),
(254, 'ABOUT'),
(255, 'HELP CENTER'),
(256, 'HOME'),
(257, 'PRODUCTS'),
(258, 'SERVICES'),
(259, 'ABOUT'),
(260, 'HELP CENTER'),
(261, 'HOME'),
(262, 'PRODUCTS'),
(263, 'SERVICES'),
(264, 'ABOUT'),
(265, 'HELP CENTER'),
(266, 'HOME'),
(267, 'PRODUCTS'),
(268, 'SERVICES'),
(269, 'ABOUT'),
(270, 'HELP CENTER'),
(271, 'HOME'),
(272, 'PRODUCTS'),
(273, 'SERVICES'),
(274, 'ABOUT'),
(275, 'HELP CENTER'),
(276, 'HOME'),
(277, 'PRODUCTS'),
(278, 'SERVICES'),
(279, 'ABOUT'),
(280, 'HELP CENTER'),
(281, 'HOME'),
(282, 'PRODUCTS'),
(283, 'SERVICES'),
(284, 'ABOUT'),
(285, 'HELP CENTER'),
(286, 'HOME'),
(287, 'PRODUCTS'),
(288, 'SERVICES'),
(289, 'ABOUT'),
(290, 'HELP CENTER'),
(291, 'HOME'),
(292, 'PRODUCTS'),
(293, 'SERVICES'),
(294, 'ABOUT'),
(295, 'HELP CENTER'),
(296, 'HOME'),
(297, 'PRODUCTS'),
(298, 'SERVICES'),
(299, 'ABOUT'),
(300, 'HELP CENTER'),
(301, 'HOME'),
(302, 'PRODUCTS'),
(303, 'SERVICES'),
(304, 'ABOUT'),
(305, 'HELP CENTER'),
(306, 'HOME'),
(307, 'PRODUCTS'),
(308, 'SERVICES'),
(309, 'ABOUT'),
(310, 'HELP CENTER'),
(311, 'HOME'),
(312, 'PRODUCTS'),
(313, 'SERVICES'),
(314, 'ABOUT'),
(315, 'HELP CENTER'),
(316, 'HOME'),
(317, 'PRODUCTS'),
(318, 'SERVICES'),
(319, 'ABOUT'),
(320, 'HELP CENTER'),
(321, 'HOME'),
(322, 'PRODUCTS'),
(323, 'SERVICES'),
(324, 'ABOUT'),
(325, 'HELP CENTER'),
(326, 'HOME'),
(327, 'PRODUCTS'),
(328, 'SERVICES'),
(329, 'ABOUT'),
(330, 'HELP CENTER'),
(331, 'HOME'),
(332, 'PRODUCTS'),
(333, 'SERVICES'),
(334, 'ABOUT'),
(335, 'HELP CENTER'),
(336, 'HOME'),
(337, 'PRODUCTS'),
(338, 'SERVICES'),
(339, 'ABOUT'),
(340, 'HELP CENTER'),
(341, 'HOME'),
(342, 'PRODUCTS'),
(343, 'SERVICES'),
(344, 'ABOUT'),
(345, 'HELP CENTER'),
(346, 'HOME'),
(347, 'PRODUCTS'),
(348, 'SERVICES'),
(349, 'ABOUT'),
(350, 'HELP CENTER'),
(351, 'HOME'),
(352, 'PRODUCTS'),
(353, 'SERVICES'),
(354, 'ABOUT'),
(355, 'HELP CENTER'),
(356, 'HOME'),
(357, 'PRODUCTS'),
(358, 'SERVICES'),
(359, 'ABOUT'),
(360, 'HELP CENTER'),
(361, 'HOME'),
(362, 'PRODUCTS'),
(363, 'SERVICES'),
(364, 'ABOUT'),
(365, 'HELP CENTER'),
(366, 'HOME'),
(367, 'PRODUCTS'),
(368, 'SERVICES'),
(369, 'ABOUT'),
(370, 'HELP CENTER'),
(371, 'HOME'),
(372, 'PRODUCTS'),
(373, 'SERVICES'),
(374, 'ABOUT'),
(375, 'HELP CENTER'),
(376, 'HOME'),
(377, 'PRODUCTS'),
(378, 'SERVICES'),
(379, 'ABOUT'),
(380, 'HELP CENTER'),
(381, 'HOME'),
(382, 'PRODUCTS'),
(383, 'SERVICES'),
(384, 'ABOUT'),
(385, 'HELP CENTER'),
(386, 'HOME'),
(387, 'PRODUCTS'),
(388, 'SERVICES'),
(389, 'ABOUT'),
(390, 'HELP CENTER'),
(391, 'HOME'),
(392, 'PRODUCTS'),
(393, 'SERVICES'),
(394, 'ABOUT'),
(395, 'HELP CENTER'),
(396, 'HOME'),
(397, 'PRODUCTS'),
(398, 'SERVICES'),
(399, 'ABOUT'),
(400, 'HELP CENTER'),
(401, 'HOME'),
(402, 'PRODUCTS'),
(403, 'SERVICES'),
(404, 'ABOUT'),
(405, 'HELP CENTER'),
(406, 'HOME'),
(407, 'PRODUCTS'),
(408, 'SERVICES'),
(409, 'ABOUT'),
(410, 'HELP CENTER'),
(411, 'HOME'),
(412, 'PRODUCTS'),
(413, 'SERVICES'),
(414, 'ABOUT'),
(415, 'HELP CENTER'),
(416, 'HOME'),
(417, 'PRODUCTS'),
(418, 'SERVICES'),
(419, 'ABOUT'),
(420, 'HELP CENTER'),
(421, 'HOME'),
(422, 'PRODUCTS'),
(423, 'SERVICES'),
(424, 'ABOUT'),
(425, 'HELP CENTER'),
(426, 'HOME'),
(427, 'PRODUCTS'),
(428, 'SERVICES'),
(429, 'ABOUT'),
(430, 'HELP CENTER'),
(431, 'HOME'),
(432, 'PRODUCTS'),
(433, 'SERVICES'),
(434, 'ABOUT'),
(435, 'HELP CENTER'),
(436, 'HOME'),
(437, 'PRODUCTS'),
(438, 'SERVICES'),
(439, 'ABOUT'),
(440, 'HELP CENTER'),
(441, 'HOME'),
(442, 'PRODUCTS'),
(443, 'SERVICES'),
(444, 'ABOUT'),
(445, 'HELP CENTER'),
(446, 'HOME'),
(447, 'PRODUCTS'),
(448, 'SERVICES'),
(449, 'ABOUT'),
(450, 'HELP CENTER'),
(451, 'HOME'),
(452, 'PRODUCTS'),
(453, 'SERVICES'),
(454, 'ABOUT'),
(455, 'HELP CENTER'),
(456, 'HOME'),
(457, 'PRODUCTS'),
(458, 'SERVICES'),
(459, 'ABOUT'),
(460, 'HELP CENTER'),
(461, 'HOME'),
(462, 'PRODUCTS'),
(463, 'SERVICES'),
(464, 'ABOUT'),
(465, 'HELP CENTER'),
(466, 'HOME'),
(467, 'PRODUCTS'),
(468, 'SERVICES'),
(469, 'ABOUT'),
(470, 'HELP CENTER'),
(471, 'HOME'),
(472, 'PRODUCTS'),
(473, 'SERVICES'),
(474, 'ABOUT'),
(475, 'HELP CENTER'),
(476, 'HOME'),
(477, 'PRODUCTS'),
(478, 'SERVICES'),
(479, 'ABOUT'),
(480, 'HELP CENTER'),
(481, 'HOME'),
(482, 'PRODUCTS'),
(483, 'SERVICES'),
(484, 'ABOUT'),
(485, 'HELP CENTER'),
(486, 'HOME'),
(487, 'PRODUCTS'),
(488, 'SERVICES'),
(489, 'ABOUT'),
(490, 'HELP CENTER'),
(491, 'HOME'),
(492, 'PRODUCTS'),
(493, 'SERVICES'),
(494, 'ABOUT'),
(495, 'HELP CENTER'),
(496, 'HOME'),
(497, 'PRODUCTS'),
(498, 'SERVICES'),
(499, 'ABOUT'),
(500, 'HELP CENTER'),
(0, 'Services'),
(0, 'Home'),
(0, 'Products'),
(0, 'Services'),
(0, 'Products');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chatID`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faqsID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratingID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cartID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chatID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faqsID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratingID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
