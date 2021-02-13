-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 12:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secure_bharat_fi`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` smallint(6) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `position` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `position`) VALUES
(1, 'Yahoo Hack', 'The Internet service company Yahoo! reported two major data breaches of user account data to hackers during the second half of 2016. The first announced breach, reported in September 2016, had occurred sometime in late 2014, and affected over 500 million Yahoo! user accounts.[1] A separate data breach, occurring earlier around August 2013, was reported in December 2016, and affected over 1 billion user accounts.[2] Both breaches are considered the largest discovered in the history of the Internet. Specific details of material taken include names, email addresses, telephone numbers, encrypted or un encrypted security questions and answers, dates of birth, and encrypted passwords.[3] Further, Yahoo! reported that the late 2014 breach likely used manufactured web cookies to falsify login credentials, allowing hackers to gain access to any account without a password.', 1),
(2, 'Hillary Leaks Series', 'Whistle blowing website Wikileaks has finally published more than 19,000 e-mails, which contains more than 8,000 attachments from the US Democratic National Committee (DNC).\r\nThe new trove of documents apparently pilfered from the DMC released after Wikileaks yesterday announced via its official Twitter account that a \"series\" about Hillary Clinton is coming soon.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Cryptograhpy'),
(2, 'Web Security'),
(3, 'Trojan, Virus, Malware'),
(4, 'Cloud Security'),
(5, 'Mobile Security'),
(6, 'Dark Web');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `course_description` text NOT NULL,
  `course_author` varchar(100) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_description`, `course_author`, `image`) VALUES
(1, 'EMAIL THREATS', 'E-Mails are just like postcards from which the information can be viewed by anyone. When a mail is transferred from one mail server to another mail server there are various stops at which there is a possibility of unauthorized users trying to view the information or modify it. Since a backup is maintained for an e-Mail server all the messages will be stored in the form of clear text though it has been deleted from your mailbox. Hence there is a chance of viewing the information by the people who are maintaining backups. So it is not advisable to send personal information through e-Mails.', 'ARPIT', '1'),
(2, 'Phishing', 'Phishing is a way of attempting to acquire information such as usernames, passwords, PIN,bank account, credit card details by masquerading as a trustworthy entity details through electronic communication means like e-mail.\r\n\r\nPhishing is typically carried out by e-mail spoofing or instant messaging and it often directs users to enter details at a fake website whose look and feel are almost identical to the legitimate one. Phishing is an example of social engineering techniques used to deceive users.', 'DIXIT', '2'),
(3, 'ATM FRAUDS', 'The Automated Teller Machine (ATM) was first commercially introduced in the 1960s. By 2005, there were over 1.5 million ATMs installed worldwide. The introduction of the ATM proved to be an important technological development that enabled financial institutions to provide services to their customers in a 24X7 environment. The ATM has enhanced the convenience of customers by enabling them to access their cash wherever required from the nearest ATM. Financial institutions have implemented many strategies to upgrade the security at their ATMs and reduce scope for fraud. These include choosing a safe location for installing the ATM, installation of surveillance video cameras, remote monitoring, anti-card skimming solutions, and increasing consumer awareness by informing them of various methods of safeguarding their personal information while transacting at the ATM or on the Internet.', 'SHUBHAM', '3'),
(4, 'ONLINE BANKING', 'Online Banking can also be referred as Internet Banking. It is the practice of making bank transactions or paying bills through the internet. We can do all financial transactions by sitting at home or office. Online banking can be used for making deposits, withdrawals or we can even use it for paying bills online. The benefit of it is the convenience for customers to do banking transactions . The customers need not wait for bank statements, which arrive by e-mail to check their account balance. They can check their balance each and every day by just logging into their account. They can catch the discrepancies in the account and can act on it immediately.', 'PIYUSH', '4');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `question_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `question_name` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text,
  `correct_option` int(11) NOT NULL,
  `complete_answer` text NOT NULL,
  `image_path` varchar(250) DEFAULT NULL,
  `question_category_id` int(11) DEFAULT NULL,
  `question_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`question_id`, `question_no`, `question_name`, `option1`, `option2`, `option3`, `option4`, `correct_option`, `complete_answer`, `image_path`, `question_category_id`, `question_level`) VALUES
(1, 1, 'While opening the email, you got an interesting but suspicious message from a company.The message said that you have won the lottery and the company was asking you specific personal and banking details so that they could lodge a large sum of money in your bank account.<br>\nThese emails are a common type of cyber-attack that goes by the name of ..', 'Phishing', 'Spyware', 'Spoofing', NULL, 1, 'This is the correct answer. With Phishing an attacker tries to collect user personal data (such as passwords and credit card numbers) by means of fake apps, fake SMS or fake email messages that seem genuine. The attacker may either ask you to provide your data directly (i.e. via replying in the mail) or via visiting a web site that he/she proposes. Never answer a message that appears to be phishing.', 'images/image18.jpg', NULL, 1),
(2, 2, 'You connect to public Wi-Fi to buy gifts online and chat with your friends. What\'s the worst that can happen?', 'Hackers will intercept your credentials and steal the money in your banking account.', 'Your battery will discharge.', 'Nothing bad will happen .I do it all the time.', NULL, 1, 'Criminals use public Wi-Fi to intercept the financial and private data of the people who connect to open hotspots.', 'images/image4.jpg', NULL, 1),
(3, 6, 'Why are iris and fingerprint sensors considered unreliable protection for smartphones?', 'Modern computers allow brute forcing of people\'s fingerprints and iris patterns.', 'In fact, there are people with identical irises and fingerprints.', 'Photo of your eye and hand in high resolution can be used to fool even modern sensors.', NULL, 3, 'Unfortunately, photography is far ahead of biometric protection:-a good photo can deceive even the newest sensors.', 'images/image6.jpg', NULL, 1),
(4, 26, 'which of the following can\'t help you in preventing e-mail threats ?', 'Use e-Mail filtering software to avoid Spam so that only messages from authorized users are received', 'Ignore e-mails from strangers', 'Click on the e-Mails that you receive from un trusted users, for executing some code.', NULL, 3, 'Avoid sending personal information through e-Mails.<br>\r\nAvoid filling forms that come via e-Mail asking for your personal information and do not click on links that come via e-Mail.<br>\r\nDo not click on the e-Mails that you receive from un trusted users as clicking itself may execute some malicious code and spread into your system.', 'images/image26.jpg', NULL, 1),
(5, 23, 'You are a very heavy user of mobile apps. You have apps that are being used by your kids for playing and learning.\nYou have apps that you use in your leisure time for staying informed about what happens in your city. You have apps that you use to keep in touch with your friends. Whenever you see an interesting app you want it and your instinct is just to download and install it.\n\nHowever for ensuring your safety and security it is best to ?', 'Make sure you do not incur hidden costs when downloading an app.', 'Check that the app comes from a reputable source.', 'Avoid having too many apps installed.', NULL, 2, 'Before installing or using new smartphone apps or services, it is important to check their reputation. Never install any software onto the device unless it is from a trusted source. Also, make sure that, especially if the app is cost-free, you fully understand which personal data it uses and make sure that you agree with this.', 'images/image23.jpg', NULL, 1),
(6, 22, 'On your personal laptop you have been using some of the same computer programs for years.\nOne of your friends, who is an expert in security, noticed that one of your programs has long been discontinued by the manufacturer. Your friend told you that this old and discontinued software exposes your computer to serious security threats.\n\nAmong these threats your friend mentioned      ', 'The Dark Net', 'Malicious Software', 'Privacy Invasions', NULL, 2, 'Using discontinued software implies exposure to a number of risks such as malicious software (malware) due to the software lacking updates. See for more information and additional threats coming from the use of discontinued software a recent ENISA recommendation: Users should make sure that they are aware and understand the security risk they are exposing themselves to by continuing to use obsolete software.', 'images/image22.jpg', NULL, 1),
(7, 13, 'How can you protect against government surveillance ?', 'Use a VPN solution and encryption technology to protect your confidential information.', 'Using incognito mode browsing.', 'Use an antivirus, so that you become invincible to the government.', NULL, 1, 'Government malware accelerates the evolution of criminal malware- cyber criminals do a lot of reverse engineering on government malware, and use its tactics and technical approach to create new, more advanced malware of their own.\nGovernments have fortified zero day vulnerability black markets - Zero Day vulnerabilities auctions have become common, but governments are buying the intelligence related to these vulnerabilities and weapon zing them, instead of disclosing them responsibly, as is the norm in the cyber security industry.\nGovernments try to restrict/backdoor/break encryption  in the name of -transparency and protection against cyber criminals and terrorists, governments all over the world are trying to limit every individual\'s right to encrypt confidential information. This is why cyber policies can do more damage than good.', 'images/image13.jpg', NULL, 1),
(8, 32, 'Which of the following is an fact of cyber bullying.', 'Cyberbullying can happen 24 hours a day, 7 days a week, and reach a kid even when he or she is alone. It can happen any time of the day or night.', 'Cyberbullying messages and images can be posted anonymously and distributed quickly to a very wide audience. It can be difficult and sometimes impossible to trace the source.', 'Both of them', NULL, 3, 'Cyberbullying is bullying that takes place using electronic technology. Electronic technology includes devices and equipment such as cell phones, computers, and tablets as well as communication tools including social media sites, text messages, chat, and websites', 'images/image32.jpg', NULL, 1),
(9, 25, 'You have noticed that your computer is acting erratically and normal tasks (e.g., open a document/application), are taking a little bit longer to perform.\nSo you called a friend of yours who is a computer technician and always helps you when your computer has problems. After a careful inspection he told you that your computer has been infected by a \'Trojan Horse\'.\n\nYou wonder what a \'Trojan Horse\' could be?', 'It is a computer virus that frequently attack computers.', 'It is a malicious software that allows other programs to control your computer by misleading users of its true intent.', 'It is a malfunction of the software that makes it difficult to navigate the Internet.', NULL, 2, 'This is the correct answer. A Trojan horse is an autonomous program that appears to be doing what the user wants, but is actually doing something else. Hence, this unwanted, hidden, additional function could allow other programs to control your computer by misleading users of its true intent. A characteristic example of a Trojan Horse is the case with the AIDS Trojan that encrypted the user\'s data after a number of reboots', 'images/image25.jpg', NULL, 1),
(10, 16, 'Social engineering - cyber criminals\' favorite way to manipulate victims. Why?', 'Because it only need computer to manipulate victims. ', 'It is based on the basic hardware knowledge.', 'People are the weakest link.', NULL, 3, 'People are the weakest link when it comes to cyber security, which is why psychological manipulation of cyber attack victims is so common.\r\n\r\nAccording to the definition, social engineering, in the context of information security, refers to psychological manipulation of people into performing actions or divulging confidential information. This is a type of confidence trick for the purpose of information gathering, fraud, or system access, and the first type of attack of this kind known in history is the Trojan horse itself (not the computer virus, but the Greek mythical event).', 'images/image16.jpg', NULL, 1),
(11, 11, 'Which type of act does not come in the insider attack?', 'when a employee resigns on the spot without providing any notice?', 'Exploited insiders, who  may be “tricked” by external parties into providing data or passwords they shouldn’t.', 'Careless insiders may simply press the wrong key and accidentally delete or modify critical information.', NULL, 1, 'If a soon-to-be-ex-colleague decides to do some damage before he/she leaves the company, make sure your work goes unaffected.\r\nBe careful how you manage your passwords: use a password management application, use strong passwords and change them regularly.\r\nProtect your shared documents and keep updated backups of all the information you’re working on.', 'images/image11.jpg', NULL, 1),
(12, 7, 'What kind of malware reached the International Space Station?', 'A keylogger developed by hackers from North Korea.', 'A password-stealing worm meant to target online gamers.', 'A simple virus written as a training exercise by astronauts. It was no big deal, but the media made a fuss about it.', NULL, 2, 'In 2008 they found malware in space! Fortunately, there was no threat to the command-and-control systems at the space station.', 'images/image7.jpg', NULL, 1),
(13, 33, 'You came across a website that looks exactly like Facebook but it has a different domain which you have never heard of, which of the following is the best course of action that should be taken?', 'Hack that website and deface it then post it on Facebook or Twitter.', 'Launch DDoS (Distributed Denial of Service) attacks into that website with the help of your friends if you can\'t hack it in order to take it offline then post it in Facebook or      Twitter. #TangoDown!', 'Do not login into that website and report it as a phishing page to Google Safe       Browsing Team - https://www.google.com/safebrowsing/report_phish/.', NULL, 3, 'This is a possible phishing attempt which could harm other cyber citizens because the website could store the login credentials if the user is not that cyber-savvy. As a concerned cyber citizen, you need to be vigilant but don’t hack it or launch DDoS attacks on it instead report it to security teams or computer emergency response teams like the Google Safe Browsing Team, US-CERT, etc. By hacking and DDosing it, you are being unethical.', 'images/image34.jpg', NULL, 1),
(14, 8, 'Which of the following is not considering the hacktivism ?', 'a politically motivated technology hack.', 'allegation from one political organisation on another.', 'use of computers and computer networks to promote a political agenda.', NULL, 2, 'Hacktivism accounts for half of the cyber attacks launched in the world. The term represents a subversive use of computers and computer networks to promote a political agenda. With roots in hacker culture and hacker ethics, its ends are often related to the free speech, human rights, or freedom of information.', 'images/image14.jpg', NULL, 1),
(15, 15, ' the most expensive virus in the world and in cyber security history, having caused an estimated financial damage of $38.5 billion! It is transmitted as', 'Tapeworms', 'EarthWorm', 'e-mail worm', NULL, 3, 'Mydoom was mainly transmitted by email, disguised as spam email. A user might inadvertently open the attachment in the email and the worm would re-send itself to every address it could find. The original version contained a payload that did two things: it opened a backdoor into the user’s computer, allowing remote control of it, while also conducting a DDoS attack (Direct Denial Of Service) against SCO group’s website.', 'images/image15.jpg', NULL, 1),
(17, 17, 'Passwords are strings of characters used to access online services (e.g. your email or social networks profile).\r\nHowever they also help to prevent other people from accessing your personal accounts. Unfortunately, because we use so many services, it is difficult to remember each password that we have.\r\nIn this situation, what could be a good strategy?', 'I save all my different passwords in a file: when I need one, I can easily retrieve it.', 'I still prefer to use a different password each time.', 'I still prefer to use a different password each time.', NULL, 3, 'Having different passwords for each service, not saving them in any file, is the correct strategy for securing one’s own accounts. Indeed, if you choose the same password for all your services, then in case that a malicious user manages to learn your password from one service, he/she will have access to all your accounts in all services. Furthermore, it is important to have strong passwords having adequate length (i.e. at least 8 characters) composed of both lower and upper case letters, as well as numbers and non-alphanumeric characters.\r\n\r\nFor more information, including ideas to choose strong passwords that you can remember, you may see here:', 'images/image17.jpg', NULL, 1),
(18, 18, 'When hackers leaked data from the Ashley Madison dating site in 2015, everybody found out that:', 'All of the women on Ashley Madison were blonde.', 'The former Prime Minister of Great Britain, Tony Blair, used the site for secret affairs.', '70,000 of the women on the website were actually bots.', NULL, 3, 'Gizmodo authors analyzed the leaked database and discovered that the company created the legion of bots and taught them to flirt with visitors — to “create the illusion of a vast playland of available women.” This discovery pissed off a lot of people and almost destroyed Ashley Madison’s reputation.', 'images/image2.jpg', NULL, 1),
(21, 21, 'Malware is software that has a malicious intent to harm users and their devices.\r\nA relevant protection in these cases is to have an antivirus software installed. However, even this is not sufficient as the antivirus needs to be constantly updated.\r\n\r\nWhat is your perspective about the need for updating the antivirus?', 'I Updating of my antivirus should be performed only if I don’ t regularly patch my operating system.', 'The antivirus update protects my computer from newly created malware.', 'The antivirus updates ensure the correct performance of my computer.', NULL, 2, 'This is the correct answer. Antivirus updates do offer you the latest protection against new forms of malware. This would normally include ‘signature files’ of new malware, i.e. information for identifying malware. Hence, antivirus should be updated very frequently – preferably, on a daily basis. Note that although patching your operating system is also important for security, this does not protect you for all new malware – that’s why you need to update your antivirus', 'images/image21.jpg', NULL, 1),
(24, 24, 'These days in the media it is not uncommon to hear that organisations and companies have suffered from cyber-attacks.\r\nThe popular image is that these attacks are carried out by so-called malicious hackers that are external to an organisation. However several observations show that many of these attacks are carried out by organisation employees/officers or former employees.What is the common name which is given to this latter type of threat?', 'Ethical hacking', 'Trolling', 'Insider Threat', NULL, 3, 'This is the correct answer indeed. While it is common to think that cyber-attacks come from external sources, often attacks come from the inside. The insider threat – for example an employee - might obtain access to the computer systems or networks of an organisation, and then conduct harmful or criminal activities against the organisation. However a significant amount of insider threats stem from unintentional user errors/mistakes.', 'images/image24.jpg', NULL, 1),
(27, 27, 'how information sending by email help in stealing credit card information ?', 'E-mails are not secured.', 'The compromise can occur by many common routes and can usually be conducted without tipping off the card holder.', 'Someone can easily hacked your email account and use your credit card information.', NULL, 2, 'Credit card fraud is a wide-ranging term for theft and fraud committed using a credit card or any similar payment mechanism as a fraudulent source of funds in a transaction. The purpose may be to obtain goods without paying, or to obtain unauthorized funds from an account. Credit card fraud is also an adjunct to identity theft.', 'images/image27.jpg', NULL, 1),
(28, 28, 'Which of the following not a browsing risk?', 'Phishing (spoofing)', 'Earthquake', 'Pop-ups', NULL, 2, 'Pop-ups are a small windowpane that opens automatically on your browser. Generally, they show advertising, which can be from legitimate company, but also may be scams or dangerous software.\r\n\r\nspoofing is a term used to describe methods of faking various parts of the browser user interface. This may include the address or location bar, the status bar, the padlock, or other user interface elements', 'images/image28.jpg', NULL, 1),
(29, 29, 'Which of the following is good for making yourself secured ?', 'Sharing of password to the close friends and family.', 'Share your every emotions on social media in the form of text, images etc. ', 'By taking care of privacy policies of different social platforms', NULL, 3, 'Hacker\'s can\'t steal your personal data.\r\nPossibility of Cyber bullying is reduced. ', 'images/image29.jpg', NULL, 1),
(30, 30, 'What is the cyber security?', 'Install a smoke alarm.', 'Lock on your home door.', 'Protecting your informations.', NULL, 3, 'Cybersecurity is the body of technologies, processes and practices designed to protect networks, computers, programs and data from attack, damage or unauthorized access.', 'images/image30.jpg', NULL, 1),
(31, 31, 'When is the best time to lie to your information security auditor or officer?', 'If you want to cover up your best friend’s faults or mistakes ', 'If it impacts the termination of the key people in your organization', 'none of the above', NULL, 3, 'This is a very tricky question and it has been used in some technical and security interviews. You should never lie to your information security auditor or officer since their role is to maintain the confidentiality, integrity, and availability (CIA triad) of the assets and technologies of your organization or company. A good information security auditor or officer can help you about the cyber security problems in your organization. Even if you lost key people in your organization because of their wrongdoings – do not cover them up. There is a due process in a good organization or company.', 'images/image31.jpg', NULL, 1),
(32, 20, 'One day you were listening to the evening news while preparing your dinner at home.\r\nOn the TV show the journalist was interviewing a computer industry expert talking about the importance of regularly updating and patching computer operating systems for security reasons. However you were distracted by cooking and could not understand why he was insisting on that.\r\n\r\nWhen thinking about it the day after, you think that patching the operating system…', 'Fixes problems and makes the operating system more secure.', 'Allows you to continue using your software without paying.', 'Improves the working functions of my operating system.', NULL, 1, 'Patching the operating system is usually a way to fix bugs and security problems for your computer. Keeping your operating system updated is a good strategy that helps to secure your computer and, thus, your data.', 'images/image20.jpg', NULL, 1),
(34, 34, 'While visiting your favorite website for downloading the Firefox browser, a popup appears that says “You just won 100,000 US dollars! Click this link to claim your prize”, what should you do?\r\n\r\n', 'Share the link to your friends, classmates and colleagues so that they could also claim the prize because sharing is caring.', 'Report the popup and the details to the website administrator and don’t download the Firefox browser.', 'Click the popup and claim your prize.', NULL, 3, 'There are two possibilities of what just happened here. The website could be hacked and backdoored wherein the attacker placed a malicious link or the website administrator didn’t fully review the advertising ads he or she placed on the website. You should inform the website administrator and explain to him or her that this could harm other computer users who are not that vigilant.', 'images/image34.jpg', NULL, 1),
(35, 35, 'Your college best friend has just sent you a chat in Facebook and sent with a link. The link is a shortened URL for example https://goo.gl/wf4V8Z, what should you do?', 'Click the link because it shouldn’t be malicious since he/she is your best friend after all. There is nothing to worry about.\r\n', 'Do not click the link and try to check the URL using an online tool that checks where it really takes you.', 'Contact your local Computer Emergency Response / Readiness Team because it may contain malicious software.', NULL, 2, 'The shortened URL could take you to a malicious website which could steal your cookies, exploit the trust of your browser, or exploit the vulnerability of your browser wherein the attacker can then control your computer (check out BeeF or Metasploit video tutorials on how an attacker could control your PC if you want to know more). The best way to ensure that it will take you to a legitimate site is to use an online URL expander like http://longurl.org/. If it takes you to an unknown website or if you suspect that the website is malicious report it.', 'images/image35.jpg', NULL, 1),
(36, 36, 'You went to Starbucks to buy a coffee and then while waiting for your order, you decided to connect to their Free WIIFI. While browsing to your Google Mail (https://mail.google.com/), the page redirects to http://www.googlemail.rahul.net. What do you think should you do?', 'Login to where Google Mail has redirected, it’s just one of Google’s web sites – not suspicious at all.', 'Disconnect to Starbuck’s WIFI network.', 'Find the Wireless Access Point and reboot it', NULL, 2, 'Someone maybe conducting ARP spoofing and routing all the Google Mail traffic to http://www.googlemail.rahul.net so it’s wise to just disconnect to their WIFI connection or else your Gmail credentials will be sniffed. It would also be wise to approach their IT personnel about their problem. http://www.googlemail.rahul.net is possibly owned by the attacker. For me, it’s wise not to connect to Free WIFI networks and be partially paranoid about where you connect to.', 'images/image36.jpg', NULL, 1),
(37, 37, 'Why is backing up data files important?', ' Backups ensure that the information you need is there when you need it', 'f the information is damaged it can be recovered ', 'both of the above', NULL, 3, 'The Importance of Backing Up Files. It is very important to do regular backups to prevent the lost of data. Software can be reinstalled but your data could quite possibly be lost for ever. There are various causes for data loss, machine breakdown, virus, power outage, software upgrades, fire, flood and human error.', 'images/image37.jpg', NULL, 1),
(38, 38, 'Social networking on websites can be a fun and convenient way to meet people and stay connected. What information do you include on your social networking profile? ', 'My date of birth, including the year', 'My phone number My physical address', 'None of this information appears publicly on my profile', NULL, 3, '', 'images/image58.jpg', NULL, 1),
(39, 39, 'Which of the following kinds of documents  you should shred before throwing away? ', 'Cancelled checks,Financial statements,Expired bank cards ', 'Transaction and ATM receipts,Unwanted credit offers', 'Both of the above', NULL, 3, '', 'images/image59.jpg', NULL, 1),
(40, 40, 'Which of the following statements is true?', 'I receive my financial information (bank statements, credit card statements, checks, or other notices) online or in a secure mailbox.', 'I review financial statements or account activity online regularly and report any discrepancies or suspicious transactions immediately.\r\n', 'None of the above', NULL, 3, 'Generally,everyone among us do the same mistakes everyday.', 'images/image60.jpg', NULL, 1),
(41, 41, 'Choose which of the following things you do ?', 'I change my password regularly (every 30 to 60 days).', 'I use my date of birth, Social Security number, or other personal information for my password.\r\n', 'I choose passwords that contain a combination of letters, numbers, and special characters.\r\n', NULL, 3, '', 'images/image61.jpg', NULL, 1),
(43, 43, 'Mobile banking applications are programs you can download to your mobile device. If you have suspicions about the authenticity of a mobile banking app, what should you do? ', 'ownload it anyway because tools on the Web are always safe', 'Contact the financial institution for instructions on how to access its mobile app', 'Conduct your banking through the official mobile website instead of using the app', NULL, 3, 'Mobile banking is a service provided by a bank or other financial institution that allows its customers to conduct financial transactions remotely using a mobile device such as a mobile phone or tablet. It uses software, usually called an app, provided by the financial institution for the purpose. Mobile banking is usually available on a 24-hour basis. Some financial institutions have restrictions on which accounts may be accessed through mobile banking, as well as a limit on the amount that can be transacted.', 'images/image63.jpg', NULL, 1),
(46, 46, 'What is the most common delivery method for viruses?', 'Email', 'Instant Message', 'Internet download and Portable media', NULL, 1, 'To avoid contact with a virus it’s important to exercise caution when surfing the web, downloading files, and opening links or attachments. As a best practice, never download text or email attachments that you’re not expecting, or files from websites you don’t trust.', 'images/image66.jpg', NULL, 1),
(47, 47, 'Which statement most accurately describes virus?', 'A program that is secretly installed onto your computer and makes copies of itself which consumes your computer resources', 'A program that protects your computer from hackers', 'A program that is installed onto your computer that monitors your internet use', NULL, 1, 'A computer virus, much like a flu virus, is designed to spread from host to host and has the ability to replicate itself. Similarly, in the same way that viruses cannot reproduce without a host cell, computer viruses cannot reproduce and spread without programming such as a file or document.', 'images/image67.jpg', NULL, 1),
(48, 48, 'Which of the following is a measure for preventing a social engineering attack except:', 'Do not give out computer or network information', 'Do not complete confidential company tasks in an unsecure setting', 'Do not secure sensitive documents and media', NULL, 3, 'At the root of many ransomware attacks is the art of social engineering, which involves manipulating a person or persons in order to access corporate systems and private information. Social engineering, widely used in ransomware crimes, plays into human nature’s inclination to trust. For hackers, it is the easiest method for obtaining access to a private system. After all, why would anyone spend the time trying to guess someone’s password when they can simply ask for it themselves?', 'images/image68.jpg', NULL, 1),
(49, 49, 'What should you do if you think your password has been compromised?', 'Change your password and report the incident to the proper authorities - such as a system administrator(s)', 'Check other systems that you have accounts on as they may be compromised as well', 'All the above', NULL, 3, 'Whenever Your account get breached. Block access to your credit report. Use different passwords for all online accounts. ', 'images/image69.jpg', NULL, 1),
(50, 50, 'While visiting your favorite website for downloading the Firefox browser, a popup appears that says “You just won 100,000 US dollars! Click this link to claim your prize”, what should you do?', 'Ignore that popup and just download the Firefox browser.', 'Click the popup and claim your prize.\r\nShare the link to your friends, classmates and colleagues so that they could also claim the prize because sharing is caring.', 'Report the popup and the details to the website administrator and don’t download the Firefox browser.', NULL, 3, 'There are two possibilities of what just happened here. The website could be hacked and backdoored wherein the attacker placed a malicious link or the website administrator didn’t fully review the advertising ads he or she placed on the website. You should inform the website administrator and explain to him or her that this could harm other computer users who are not that vigilant.', 'images/image70.jpg', NULL, 1),
(51, 1, '________ is the science and art of transforming messages to make them secure and immune to attacks.\n<br>', 'Cryptography\n<br>', 'Cryptoanalysis\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 1, '', NULL, NULL, 2),
(52, 2, 'The ________is the original message before transformation.\n<br>', 'ciphertext\n<br>', 'plaintext\n<br>', 'secret-text\n<br>', 'none of the above\n<br>', 2, '', NULL, NULL, 2),
(53, 3, 'The ________ is the message after transformation.\n<br>', 'ciphertext\n<br>', 'plaintext\n<br>', 'secret-text\n<br>', 'none of the above\n<br>', 1, '', NULL, NULL, 2),
(54, 4, 'A(n) _______ algorithm transforms plaintext to ciphertext\n<br>', 'encryption\n<br>', 'decryption\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 1, '', NULL, NULL, 2),
(55, 5, 'A(n) ______ algorithm transforms ciphertext to plaintext.\n<br>', 'encryption\n<br>', 'decryption\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 2, '', NULL, NULL, 2),
(56, 6, 'A combination of an encryption algorithm and a decryption algorithm is called a ________.\n<br>', 'cipher\n<br>', 'secret\n<br>', 'key\n<br>', 'none of the above\n<br>', 1, '', NULL, NULL, 2),
(57, 7, 'The _______ is a number or a set of numbers on which the cipher operates.\n<br>', 'cipher\n<br>', 'secret\n<br>', 'key\n<br>', 'none of the above\n<br>', 3, '', NULL, NULL, 2),
(58, 8, 'In a(n) ________ cipher, the same key is used by both the sender and receiver.\n<br>', 'symmetric-key\n<br>', 'asymmetric-key\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 1, '', NULL, NULL, 2),
(59, 9, 'In a(n) ________, the key is called the secret key.\n<br>', 'symmetric-key\n<br>', 'asymmetric-key\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 1, '', NULL, NULL, 2),
(60, 10, 'In a(n) ________ cipher, a pair of keys is used.\n<br>', 'symmetric-key\n<br>', 'asymmetric-key\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 2, '', NULL, NULL, 2),
(61, 11, 'In an asymmetric-key cipher, the sender uses the__________ key.\n<br>', 'private\n<br>', 'public\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 2, '', NULL, NULL, 2),
(62, 12, 'In an asymmetric-key cipher, the receiver uses the ______ key.\n<br>', 'private\n<br>', 'public\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 1, '', NULL, NULL, 2),
(63, 13, 'A ________ cipher replaces one character with another character.\n<br>', 'substitution\n<br>', 'transposition\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 1, '', NULL, NULL, 2),
(64, 14, '_________ ciphers can be categorized into two broad categories: monoalphabetic and polyalphabetic.\n<br>', 'Substitution\n<br>', 'Transposition\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 1, '', NULL, NULL, 2),
(65, 15, 'The _______ cipher is the simplest monoalphabetic cipher. It uses modular arithmetic with a modulus of 26.\n<br>', 'transposition\n<br>', 'additive\n<br>', 'shift\n<br>', 'none of the above\n<br>', 3, '', NULL, NULL, 2),
(66, 16, 'The Caesar cipher is a _______cipher that has a key of 3.\n<br>', 'transposition\n<br>', 'additive\n<br>', 'shift\n<br>', 'none of the above\n<br>', 3, '', NULL, NULL, 2),
(67, 17, 'The ________ cipher reorders the plaintext characters to create a ciphertext.\n<br>', 'substitution\n<br>', 'transposition\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 2, '', NULL, NULL, 2),
(68, 18, 'A(n) ______ is a keyless substitution cipher with N inputs and M outputs that uses a formula to define the relationship between the input stream and the output stream.\n<br>', 'S-box\n<br>', 'P-box\n<br>', 'T-box\n<br>', 'none of the above\n<br>', 1, '', NULL, NULL, 2),
(69, 19, 'A(n) _______is a keyless transposition cipher with N inputs and M outputs that uses a table to define the relationship between the input stream and the output stream.\n<br>', 'S-box\n<br>', 'P-box\n<br>', 'T-box\n<br>', 'none of the above\n<br>', 2, '', NULL, NULL, 2),
(70, 20, 'A modern cipher is usually a complex _____cipher made of a combination of different simple ciphers.\n<br>', 'round\n<br>', 'circle\n<br>', 'square\n<br>', 'none of the above\n<br>', 1, '', NULL, NULL, 2),
(71, 21, 'DES is a(n) ________ method adopted by the U.S. government.\n<br>', 'symmetric-key\n<br>', 'asymmetric-key\n<br>', 'either (a) or (b)\n<br>', 'neither (a) nor (b)\n<br>', 1, '', NULL, NULL, 2),
(72, 22, 'DES has an initial and final permutation block and _________ rounds.\n<br>', '14\n<br>', '15\n<br>', '16\n<br>', 'none of the above\n<br>', 3, '', NULL, NULL, 2),
(73, 23, 'The DES function has _______ components.\n<br>', '2\n<br>', '3\n<br>', '4\n<br>', '5\n<br>', 3, '', NULL, NULL, 2),
(74, 24, 'DES uses a key generator to generate sixteen _______ round keys.\n<br>', '32-bit\n<br>', '48-bit\n<br>', '54-bit\n<br>', '42-bit\n<br>', 2, '', NULL, NULL, 2),
(75, 25, '________ DES was designed to increase the size of the DES key\n<br>', 'Double\n<br>', 'Triple\n<br>', 'Quadruple\n<br>', 'none of the above\n<br>', 2, '', NULL, NULL, 2),
(76, 26, '_______ is a round cipher based on the Rijndael algorithm that uses a 128-bit block of data.\n<br>', 'AEE\n<br>', 'AED\n<br>', 'AER\n<br>', 'AES\n<br>', 4, '', NULL, NULL, 2),
(77, 27, 'AES has _____ different configurations\n<br>', 'two\n<br>', 'three\n<br>', 'four\n<br>', 'five\n<br>', 2, '', NULL, NULL, 2),
(78, 28, 'ECB and CBC are ________ ciphers.\n<br>', 'block\n<br>', 'stream\n<br>', 'field\n<br>', 'none of the above\n<br>', 1, '', NULL, NULL, 2),
(79, 29, 'One commonly used public-key cryptography method is the ______ algorithm.\n<br>', 'RSS\n<br>', 'RAS\n<br>', 'RSA\n<br>', 'RAA\n<br>', 3, '', NULL, NULL, 2),
(80, 30, 'The ________ method provides a one-time session key for two parties.\n<br>', 'Diffie-Hellman\n<br>', 'RSA\n<br>', 'DES\n<br>', 'AES\n<br>', 1, '', NULL, NULL, 2),
(81, 31, 'The _________ attack can endanger the security of the Diffie-Hellman method if two parties are not authenticated to each other.\n<br>', 'man-in-the-middle\n<br>', 'ciphertext attack\n<br>', 'plaintext attack\n<br>', 'none of the above\n<br>', 1, '', NULL, NULL, 2),
(82, 32, '1.What is operating system?\n<br>', 'collection of programs that manages hardware resources\n<br>', 'system service provider to the application programs\n<br>', 'link to interface the hardware and application programs\n<br>', 'all of the mentioned\n<br>', 4, '', NULL, NULL, 2),
(83, 33, 'To access the services of operating system, the interface is provided by the\n<br>', 'system calls\n<br>', 'API\n<br>', 'library\n<br>', 'assembly instructions\n<br>', 1, '', NULL, NULL, 2),
(84, 34, 'Which one of the following is not true?\n<br>', 'kernel is the program that constitutes the central core of the operating system\n<br>', 'kernel is the first part of operating system to load into memory during booting\n<br>', 'kernel is made of various modules which can not be loaded in running operating system\n<br>', 'kernel remains in the memory during the entire computer session\n<br>', 3, '', NULL, NULL, 2),
(85, 35, 'Which one of the following error will be handle by the operating system?\n<br>', 'power failure\n<br>', 'lack of paper in printer\n<br>', 'connection failure in the network\n<br>', 'all of the mentioned\n<br>', 4, '', NULL, NULL, 2),
(86, 36, 'The main function of the command interpreter is\n<br>', 'to get and execute the next user-specified command\n<br>', 'to provide the interface between the API and application program\n<br>', 'to handle the files in operating system\n<br>', 'none of the mentioned\n<br>', 1, '', NULL, NULL, 2),
(87, 37, 'By operating system, the resource management can be done via\n<br>', 'time division multiplexing\n<br>', 'space division multiplexing\n<br>', 'both (a) and (b)\n<br>', 'none of the mentioned\n<br>', 4, '', NULL, NULL, 2),
(88, 38, 'If a process fails, most operating system write the error information to a\n<br>', 'log file\n<br>', 'another running process\n<br>', 'new file\n<br>', 'none of the mentioned\n<br>', 1, '', NULL, NULL, 2),
(89, 39, 'Which facility dynamically adds probes to a running system, both in user processes and in the kernel?\n<br>', 'DTrace\n<br>', 'DLocate\n<br>', 'DMap\n<br>', 'DAdd\n<br>', 1, '', NULL, NULL, 2),
(90, 40, 'Which one of the following is not a real time operating system?\n<br>', 'VxWorks\n<br>', 'Windows CE\n<br>', 'RTLinux\n<br>', 'Palm OS\n<br>', 1, '', NULL, NULL, 2),
(91, 41, 'The OS X has\n<br>', 'monolithic kernel\n<br>', 'hybrid kernel\n<br>', 'microkernel\n<br>', 'monolithic kernel with modules\n<br>', 2, '', NULL, NULL, 2),
(92, 42, 'The dmesg command\n<br>', 'Shows user login logoff attempts\n<br>', 'Shows the syslog file for info messages\n<br>', 'kernel log messages\n<br>', 'Shows the daemon log messages\n<br>', 3, '', NULL, NULL, 2),
(93, 43, 'The command \"mknod myfifo  \n<br>', 'Will create a block device if user is root\n<br>', 'Will create a block device for all users\n<br>', 'Will create a FIFO if user is not root\n<br>', 'None of the above\n<br>', 1, '', NULL, NULL, 2),
(94, 44, 'Which command is used to set terminal IO characteristic?\n<br>', 'tty\n<br>', 'ctty\n<br>', 'ptty\n<br>', 'stty\n<br>', 4, '', NULL, NULL, 2),
(95, 45, 'Which command is used to record a user login session in a file\n<br>', 'macro\n<br>', 'reaopt4\n<br>', 'script\n<br>', 'none of the above\n<br>', 3, '', NULL, NULL, 2),
(96, 46, 'Which command is used to display the operating system name\n<br>', 'os\n<br>', 'Unix\n<br>', 'kernel\n<br>', 'uname\n<br>', 4, '', NULL, NULL, 2),
(97, 47, 'Which command is used to display the unix version\n<br>', 'uname -r\n<br>', 'uname -n\n<br>', 'uname -t\n<br>', 'kernel\n<br>', 1, '', NULL, NULL, 2),
(98, 48, 'Which command is used to print a file\n<br>', 'print\n<br>', 'ptr\n<br>', 'lpr\n<br>', 'none of the above\n<br>', 3, '', NULL, NULL, 2),
(99, 49, 'Using which command you find resource limits to the session?\n<br>', 'rlimit\n<br>', 'ulimit\n<br>', 'setrlimit\n<br>', 'getrlimit\n<br>', 2, '', NULL, NULL, 2),
(100, 50, 'Which option of ls command used to view file inode number\n<br>', '-l\n<br>', '-o\n<br>', '-opt1\n<br>', '-i\n<br>', 4, '', NULL, NULL, 2),
(101, 51, 'find / -name \'*\' wiil <br>', 'List all files and directories recursively starting from /\n<br>', 'List a file named * in /\n<br>', 'List all files in / directory\n<br>', 'List all files and directories in / directory\n<br>', 1, '', NULL, NULL, 2),
(102, 52, 'Which property helps to initiate the HTTP requests?\n<br>', 'request\n<br>', 'location\n<br>', 'send\n<br>', 'None of the mentioned\n<br>', 2, 'It is possible for JavaScript code to script HTTP, however. HTTP requests are initiated when a script sets the location property of a window object or calls the submit() method of a form object. In both cases, the browser loads a new page.\n<br>', NULL, NULL, 2),
(103, 53, 'Which method is an alternative of the property location of a window object?\n<br>', 'submit()\n<br>', 'locate()\n<br>', 'load()\n<br>', 'None of the mentioned\n<br>', 1, 'It is possible for JavaScript code to script HTTP, however. HTTP requests are initiated when a script sets the location property of a window object or calls the submit() method of a form object. In both cases, the browser loads a new page.\n<br>', NULL, NULL, 2),
(104, 54, 'Which of the following uses scripted HTTP?\n<br>', 'XML\n<br>', 'HTML\n<br>', 'Ajax\n<br>', 'All of the mentioned\n<br>', 3, 'The key feature of an Ajax application is that it uses scripted HTTP to initiate data exchange with a web server without causing pages to reload.\n<br>', NULL, NULL, 2),
(105, 55, 'Which of the below is a lieral reverse of Ajax?\n<br>', 'HTTP\n<br>', 'HTML\n<br>', 'XML\n<br>', 'Comet\n<br>', 4, 'Comet is the reverse of Ajax: in Comet, it is the web server that initiates the communication, asynchronously sending messages to the client.\n<br>', NULL, NULL, 2),
(106, 56, 'The other name for Comet is\n<br>', 'Server Push\n<br>', 'Ajax Push\n<br>', 'HTTP Streaming\n<br>', 'All of the mentioned\n<br>', 4, 'Other names for Comet include â€œServer Pushâ€, â€œAjax Pushâ€, â€œHTTP Streamingâ€.\n<br>', NULL, NULL, 2),
(107, 57, 'Which is the element that has a src property to initiate HTTP GET request?\n<br>', 'img\n<br>', 'iframe\n<br>', 'script\n<br>', 'Both a and c\n<br>', 4, 'Both img and script contains the src property thatt can be set to initiate an HTTP GET request.\n<br>', NULL, NULL, 2),
(108, 58, 'XMLHttpRequesr is a\n<br>', 'Object\n<br>', 'Class\n<br>', 'Both a and b\n<br>', 'None of the mentioned\n<br>', 3, 'XMLHttpRequest is both an object and a class.\n<br>', NULL, NULL, 2),
(109, 59, 'Which of the following are the features of an HTTP request?\n<br>', 'URL being requested\n<br>', 'Optional request body\n<br>', 'Optional set of request headers\n<br>', 'All of the mentioned\n<br>', 4, 'An HTTP request consists of four parts : the HTTP request method or â€œverb\", the URL being requested, an optional set of request headers, which may include authentication information, an optional request body\n<br>', NULL, NULL, 2),
(110, 60, 'Which of the following is a feature of the HTTP response?\n<br>', 'Mandatory response body\n<br>', 'Optional response body\n<br>', 'URL being released\n<br>', 'Optional set of response headers\n<br>', 1, 'The HTTP response sent by a server has three parts : a numeric and textual status code that indicates the success or failure of the request or a set of response headers the response body\n<br>', NULL, NULL, 2),
(111, 61, 'Which is the appropriate code to begin a HTTP GET request?\n<br>', 'request.open(\"GET\",\"data\");\n<br>', 'request.open(GET,\"data.csv\");\n<br>', 'request.open(\"GET\",\"data.csv\");\n<br>', 'request.open(\"GET\");\n<br>', 3, 'The code that begins a HTTP GET request for the contents of the specified URL is request.open(\"GET\",\"data.csv\");\n<br>', NULL, NULL, 2),
(112, 62, 'Which of these not one of the most common password of 2015?', 'hello', 'password', '123456', 'all of the above', 4, 'they all are the most popular ', NULL, NULL, 2),
(113, 63, 'Cookies were originally designed for\n<br>', 'Client-side programming\n<br>', 'Server-side programming\n<br>', 'Both a and b\n<br>', 'None of the mentioned\n<br>', 2, 'Cookies were originally designed for server-side programming, and at the lowest level, they are implemented as an extension to the HTTP protocol.\n<br>', NULL, NULL, 2),
(114, 64, 'The Cookie manipulation is done using which property?\n<br>', 'cookie\n<br>', 'cookies\n<br>', 'manipulate\n<br>', 'None of the mentioned\n<br>', 1, 'There are no methods involved: cookies are queried, set, and deleted by reading and writing the cookie property of the Document object using specially formatted strings.\n<br>', NULL, NULL, 2),
(115, 65, 'Which of the following explains Cookies nature?\n<br>', 'Non Volatile\n<br>', 'Volatile\n<br>', 'Intransient\n<br>', 'Transient\n<br>', 4, 'Cookies are transient by default; the values they store last for the duration of the web browser session but are lost when the user exits the browser.\n<br>', NULL, NULL, 2),
(116, 66, 'Which attribute is used to extend the lifetime of a cookie?\n<br>', 'higher-age\n<br>', 'increase-age\n<br>', 'max-age\n<br>', 'lifetime\n<br>', 3, 'If you want a cookie to last beyond a single browsing session, you must tell the browser how long (in seconds) you would like it to retain the cookie by specifying a max-age attribute. If you specify a lifetime, the browser will store cookies in a file and delete them only once they expire.\n<br>', NULL, NULL, 2),
(117, 67, 'Which of the following defines the Cookie visibility?\n<br>', 'Document Path\n<br>', 'localStorage\n<br>', 'sessionStorage\n<br>', 'All of the mentioned\n<br>', 4, 'Cookie visibility is scoped by document origin as localStorage and sessionStorage are, and also by document path.\n<br>', NULL, NULL, 2),
(118, 68, 'Which of the following can be used to configure the scope of the Cookie visibility?\n<br>', 'path\n<br>', 'domain\n<br>', 'Both a and b\n<br>', 'None of the mentioned\n<br>', 4, 'The Cookie visibility scope is configurable through cookie attributes path and domain.\n<br>', NULL, NULL, 2),
(119, 69, 'How can you set a Cookie visibility scope to localStorage?\n<br>', '/\n<br>', '%\n<br>', '*\n<br>', 'All of the mentioned\n<br>', 1, 'Setting the path of a cookie to â€œ/â€ gives scoping like that of localStorage and also specifies that the browser must transmit the cookie name and value to the server whenever it requests any web page on the site.\n<br>', NULL, NULL, 2),
(120, 70, 'Which of the following is a boolean cookie attribute?\n<br>', 'bool\n<br>', 'secure\n<br>', 'lookup\n<br>', 'domain\n<br>', 2, 'The final cookie attribute is a boolean attribute named secure that specifies how cookie values are transmitted over the network. By default, cookies are insecure, which means that they are transmitted over a normal, insecure HTTP connection. If a cookie is marked secure, however, it is transmitted only when the browser and server are connected via HTTPS or another secure protocol.\n<br>', NULL, NULL, 2),
(121, 71, 'Which of the following function is used as a consequence of not including semicolons, commas or whitespace in the Cookie value?\n<br>', 'encodeURIComponent()\n<br>', 'encodeURI()\n<br>', 'encodeComponent()\n<br>', 'None of the mentioned\n<br>', 1, 'Cookie values cannot include semicolons, commas, or whitespace. For this reason, you may want to use the core JavaScript global function encodeURIComponent() to encode the value before storing it in the cookie.\n<br>', NULL, NULL, 2),
(122, 72, 'What is the constraint on the data per cookie?\n<br>', '2 KB\n<br>', '1 KB\n<br>', '4 KB\n<br>', '3 KB\n<br>', 3, 'Each cookie can hold upto only 4 KB. In practice, browsers allow many more than 300 cookies total, but the 4 KB size limit may still be enforced by some.<br>', NULL, NULL, 2),
(151, 1, 'The study of secret codes associated with classified information and intelligence gathering is called  ', 'scripting.', 'Secure Sockets Layers', 'cryptography.', 'encryption.', 3, '', NULL, 1, 3),
(152, 2, '_________ key encryption is risky because the same keys have to be shared by too many people. ', 'PKI', 'private', 'public', 'asymmetric', 2, '', NULL, 1, 3),
(153, 3, 'In a ________ infrastructure, a system of servers that freely distribute keys to anyone would be established and maintained', 'PGP key', 'asymmetric key', 'private key', 'public key', 4, '', NULL, 1, 3),
(154, 4, 'A way of verifying both the sender of information and the integrity of a message is through the use of ', 'digital signatures.', 'digital certificates.', 'private key encryption.', 'public key encryption', 1, '', NULL, 1, 3),
(155, 5, 'One of the most widely used public-key algorithms today is called', 'SSL', 'PKI.', 'a hash code', 'RSA', 4, '', NULL, 1, 3),
(156, 6, 'Which of the following Acts were signed into law in 2000? ', 'Online Privacy Protection Act', 'The Cyber Security Enhancement Act', 'Electronic Signatures in Global and National Commerce Act', 'No-Electron Theft Act', 2, '', NULL, 1, 3),
(157, 7, 'An encoding algorithm that converts an input string into a numerical signature for that string is called ', 'PGP', 'a hash code.', 'RSA', 'PKI', 2, '', NULL, 1, 3),
(158, 8, 'When you receive a public key that has been signed by a number of individuals, that key is part of ', 'a digital fingerprint.', 'the web of trust.', 'an illegal scam', 'a certificate authority', 2, '', NULL, 1, 3),
(159, 9, 'An organization known as _______________ sends out information about known security holes in software.', 'PGP', 'CERT', 'PKI', 'RSA', 2, '', NULL, 1, 3),
(160, 10, 'Keys that are _____ bits long cannot be cracked by brute-force means within a reasonable period of time.', '64', '28', '56', '128', 4, '', NULL, 1, 3),
(161, 1, 'As a web application user, what puts you at most risk to fall victim to a cross-site request forgery (CSRF) attack?', 'Using an old browser', 'Using a web app that is not fully protected by SSL/TLS', 'Using the \"keep me logged in\" option offered by web apps', 'Using weak passwords', 3, 'With the \"keep me logged in\" option, a persistent cookie is set causing you to be in a permanently-authenticated state. A key factor in a successful CSRF attack is that the victim is authenticated to the target site.\r\n', NULL, 2, 3),
(162, 2, 'If you want your web application to defend itself against cross-site scripting attacks that steal session IDs, which cookie attribute is best able to help you?', 'Secure', 'Path', 'Expires', 'HttpOnly', 4, 'The HttpOnly attribute of a cookie instructs web browsers that JavaScript is not allowed to access the cookie.  This means that malicious JavaScript injected in an XSS attack can\'t access the cookie.  (HttpOnly is widely supported by web browsers)', NULL, 2, 3);
INSERT INTO `quiz` (`question_id`, `question_no`, `question_name`, `option1`, `option2`, `option3`, `option4`, `correct_option`, `complete_answer`, `image_path`, `question_category_id`, `question_level`) VALUES
(163, 3, 'What is one way developers can defend against forced browsing attacks?', 'Incorporate GUIDs into file names', 'Log all user activity', 'Validate input data', 'Use a sensible directory naming scheme', 1, 'Using GUIDs (globally unique identifiers) makes it near impossible for a user to guess valid file names.  A problem I\'ve seen frequently when doing pen tests is that the application names static files such as PDF or Excel documents in a logical, consistent manner.  For example, a file name might include the user\'s name or account number.  This could make it easy for one user to guess the name of other files and access information intended for other users', NULL, 2, 3),
(164, 4, 'A race condition in a web application can lead to a security hole.  Which software analysis technique is best suited to identify the existence of a race condition?', 'A manual penetration test', 'A dynamic (blackbox) automated scan', 'A static (whitebox) scan', 'Functional tests by QA team', 3, 'Static analysis theoretically has full insight into the whole codebase and should be able to spot a situation where multiple threads compete for the same resource.  With dynamic/run-time testing, it can\'t be guaranteed the race condition will ever manifest itself.  If you\'ve ever tried to reproduce a deadlock problem in a piece of software, you know how very difficult it can be.', NULL, 2, 3),
(165, 5, 'Your web application allows users to download their account statements in PDF format. What is the most secure way to implement this functionality? ', 'Store all PDFs in an obscure directory on the web server and provide a link to the correct PDF depending on the user.', 'Generate the PDF on the fly, write it to a temporary directory on the server, and redirect the browser to that location (via 302 response).', 'Generate the PDF on the fly, store it in memory on the server, and send the bytes of the PDF to the browser directly (via 200 response).', 'Store the PDFs in a database and retrieve the correct PDF by looking at the identifier/primary key provided in the HTTP request.', 3, 'Because the PDF is never written to disk in option c, there is no chance an attacker can forcefully browse to it.  Option d is not secure because a user could tamper with the identifier to access another user\'s document.\r\n', NULL, 2, 3),
(166, 6, 'What is the top vulnerability leading to data breaches?', 'SQL Injection', 'Cross Site Scripting', 'Cross Site Request Forgery', 'Sensitive Data Exposure', 1, 'SQL Injection has been accounted for around 97% of the data breaches across the globe. Although this application vulnerability was detected 15 years ago, it still tops the OWASP 10 list. While detecting SQLi is fairly simple, protecting website against exploitation is difficult.', NULL, 2, 3),
(167, 7, 'What is the attack technique used to exploit web sites by altering backend database queries through inputting manipulated queries?', 'LDAP Injection', 'XML Injection', 'SQL Injection', 'OS Commanding', 3, '', NULL, 2, 3),
(168, 8, 'What happens when an application takes user inputted data and sends it to a web browser without proper validation and escaping?', 'Security Misconfiguration', 'Cross Site Scripting', 'Insecure Direct Object References', 'Broken Authentication and Session Management', 2, '', NULL, 2, 3),
(169, 9, 'What flaw arises from session tokens having poor randomness across a range of values?', 'Insecure Direct Object References', 'Session Replay', 'Session Fixation', 'Session Hijacking', 4, '', NULL, 2, 3),
(170, 10, 'An attack technique that forces a user’s session credential or session ID to an explicit value.', 'Brute Force Attack', 'Session Hijacking', 'Session Fixation', 'Dictionary Attack', 3, '', NULL, 2, 3),
(171, 1, 'Which of the following is most likely to make your computer stop working? ', 'Trojan ', 'Worm', 'Virus', 'Spyware ', 3, 'Trojans, worms, spyware, and adware all depend on your computer staying up and running. They use your computer\'s resources to accomplish whatever their designer intended, such as sending emails, displaying advertising, or stealing information from your computer. Viruses, however, are usually created by vandals who just want to damage as many computers as possible.', NULL, 3, 3),
(172, 2, 'Which of the following is not a stand-alone program? ', 'Trojan', 'Worm', 'Virus', 'Spyware', 3, 'Viruses are not stand-alone programs. Just as biological viruses must take over the cells of their host in order to function and reproduce; computer viruses must take over one or more files of the computer on which they are stored. Trojans, worms, spyware, and adware are all stand-alone programs that can run without the help of another application, though they often come bundled with other applications as a decoy, or with other malware.', NULL, 3, 3),
(173, 3, 'Which of the following is most likely to send spam emails from your computer ?', 'Trojan', 'Worm', 'Virus', 'Spyware', 2, 'Worms are stand-alone programs that are often used to send spam emails, or emails containing viruses. Trojans often contain worms which are then installed for the purpose of sending spam emails, but the worms are what actually send the emails.', NULL, 3, 3),
(174, 4, 'Which of the following is lest likely to be detected with standard antivirus software? ', 'Trojan', 'Worm', 'Spyware', 'Adware', 4, 'In the strictest sense, adware is rarely patently illegal or destructive, and so antivirus software makers have traditionally avoided treating it as malware. Adware designers are usually large advertising companies with hundreds of millions of dollars, and they take care to insert end-user licensing agreements (EULA) that supposedly mean that the software is installed with permission. Also, adware will not usually do anything more destructive than show advertising. Nonetheless, adware can quickly multiply on a computer, hogging system resources and causing a computer to slow down or even malfunction. That\'s why most anti-spyware software makers target adware as well.', NULL, 3, 3),
(175, 5, 'Which of the following is most likely to come with other malware?', 'Trojan ', 'Worm', 'Virus ', 'Spyware', 1, 'By definition, Trojans bear other malware within them, just as the mythical wooden worse bore Greek warriors. The malware can be viruses, worms, spyware, or adware. ', NULL, 3, 3),
(176, 6, 'Which of the following is bundled with the peer-to-peer file-sharing software, Kazaa ?', 'Adware', 'Trojan', 'Worm', 'Virus', 1, 'adware, though d. spyware, is also correct. Kazaa\'s developers, Sharman Networks, make most of their money from the advertising shown by the included adware. The adware typically runs even when the Kazaa software is not in use. Sharman Networks has adamantly denied that the adware that comes with Kazaa is spyware, since, like most adware, it comes with an end-user license agreement that says the user grants permission for the software to be installed. In reality, few Kazaa users, until recently, were aware of just how much adware was being installed on their machines (as much as a dozen or more). Plus, the adware does monitor your internet usage, and so is spyware in the strictest sense. ', NULL, 3, 3),
(177, 7, 'Which of the following is most likely to install a \"backdoor\" internet connection?', 'Trojan ', 'Worm', 'Virus', 'Spyware', 2, 'Worms most commonly install a \"backdoor\" internet connection in order to send out data (for instance, spam emails or requests to remote servers) undetected.', NULL, 3, 3),
(178, 8, 'Which of the following is most likely to be involved in a denial-of-service attack?', 'Trojan ', 'Worm', 'Virus', 'Spyware', 2, 'Worms, which most commonly install a \"backdoor\" internet connection on the host computer, are perfect for sending out the millions of server requests needed to achieve a denial-of-service attack. A denial-of-service attack is when a server is maliciously sent so many hits that it is overwhelmed and cannot continue to operate.', NULL, 3, 3),
(179, 9, 'Which of the following is the only malware publicly documented as having been employed by the FBI to bring a suspect to trial?', 'Trojan', 'Worm', 'Virus', 'Spyware', 1, 'The Trojan \"Magic Lantern\" was famously used to install monitoring software on the computer of a suspect who was later brought to trial partly on the strength of the evidence gathered', NULL, 3, 3),
(180, 10, 'Which of the following is most likely to steal your identity?', 'Trojan', 'Worm', 'Virus', 'Spyware', 4, 'Spyware is malware that collects information from your computer and sends it to another remote machine, so by definition any software that steals your identity is spyware. However, spyware is often installed on your computer by a Trojan, or sent to you by another computer infected with a worm, so other kinds of malware pose an indirect threat of identity theft as well', NULL, 3, 3),
(181, 1, '_________ computing refers to applications and services that run on a distributed network using virtualized resources.', 'Distributed', 'Cloud', 'Soft', 'Parallel', 2, 'Cloud Computing applications are accessed by common Internet protocols and networking standards.', NULL, 4, 3),
(182, 2, 'Point out the wrong statement :', 'The massive scale of cloud computing systems was enabled by the popularization of the Internet', 'Soft computing represents a real paradigm shift in the way in which systems are deployed', 'Cloud computing makes the long-held dream of utility computing possible with a pay-as-you-go, infinitely scalable, universally available system', 'All of the mentioned', 2, 'Cloud Computing is distinguished by the notion that resources are virtual and limitless and that details of the physical systems on which software runs are abstracted from the user.', NULL, 4, 3),
(183, 3, '________ as a utility is a dream that dates from the beginning of the computing industry itself.', 'Model', 'Computing', 'Software', 'All of the mentioned', 2, 'Cloud computing takes the technology, services, and applications that are similar to those on the Internet and turns them into a self-service utility.', NULL, 4, 3),
(184, 4, 'Which of the following is essential concept related to Cloud ?', 'Reliability', 'Productivity', 'Abstraction', 'All of the mentioned', 3, 'Cloud computing abstracts the details of system implementation from users and developers', NULL, 4, 3),
(185, 5, 'Which of the following can be identified as cloud ?', 'Web Applications', 'Intranet', 'Hadoop', 'All of the mentioned', 3, 'When an intranet becomes large enough that a diagram no longer wishes to differentiate between individual physical systems, the intranet too becomes identified as a cloud', NULL, 4, 3),
(186, 6, 'Which of the following service provider provides the least amount of built in security ?', 'SaaS', 'PaaS', 'IaaS', 'All of the mentioned', 3, 'You get the least amount of built in security with an Infrastructure as a Service provider, and the most with a Software as a Service provider', NULL, 4, 3),
(187, 7, 'Point out the wrong statement:', 'You can use proxy and brokerage services to separate clients from direct access to shared cloud storage', 'Any distributed application has a much greater attack surface than an application that is closely held on a Local Area Network', 'Cloud computing don’t have vulnerabilities associated with Internet applications', 'All of the mentioned', 3, 'Additional vulnerabilities arise from pooled, virtualized, and outsourced resources.', NULL, 4, 3),
(188, 8, 'Which of the following area of cloud computing is uniquely troublesome ?', 'Auditing', 'Data integrity', 'e-Discovery for legal compliance', 'All of the mentioned', 4, 'Storing data in the cloud is of particular concern.', NULL, 4, 3),
(189, 9, 'Which of the following is considered an essential element in cloud computing by CSA ?', 'Multi-tenancy', 'Identity and access management', 'Virtualization', 'All of the mentioned', 1, 'Multi-tenancy adds a number of additional security concerns to cloud computing that need to be accounted for.', NULL, 4, 3),
(190, 10, 'Which of the following is not a type of man in cloud attack ?', 'Quick Double Switch', 'Persistent Double Switch', 'Single Switch (Quick or Persistent)', 'none of the above', 4, 'for further knowledge go at https://www.imperva.com/docs/HII_Man_In_The_Cloud_Attacks.pdf', NULL, 4, 3),
(191, 1, 'Which of these is NOT a threat to a mobile device?', 'Theft', 'Malware', 'Unsecure networks', 'Loss of continuous power', 4, '', NULL, 5, 3),
(192, 2, 'What does it mean to \'\'wipe\'\' a device?', 'To remotely delete all data', 'To constantly change the password', 'To render it useless', 'To cause it to send a signal of its location', 1, '', NULL, 5, 3),
(193, 3, 'Which Finnish developer is behind hit freemium game Clash of Clans?', 'Rovio', 'Supercell', 'microsoft', 'Reaktor', 2, '', NULL, 5, 3),
(194, 4, 'Where would you download an app from on an Android phone?', 'App Store', 'Google Play', 'Android Apps', 'Store', 2, '', NULL, 5, 3),
(195, 5, 'How a bad person can have a profit from your compromised mobile phone ?', 'financial', 'Data theft', 'Botnet activity', 'all of the above', 3, '', NULL, 5, 3),
(196, 6, 'Android rooting can\'t able to do which of the following thing ?', 'Removing manufacturer installed app.', 'modification of ROMS, modules kernel.', 'free wifi availability  ', 'low level access to the hardware', 0, '', NULL, 5, 3),
(197, 7, 'Which of the following is the wrong fact regarding securing android devices ?', 'Enable screen lock on android phone.', 'root your phupdaone', 'update your operating system regularly ', 'do not directly download the android package files.', 2, '', NULL, 5, 3),
(198, 8, 'Which of the following is not the security risk on jailbreaking of iOS ?', 'voids your phone warranty', 'malware infection', 'poor performance', 'breaking of the devices', 4, 'Jailbreaking is defined as a process of installing a set of modified patches which allowed user to run third party application not signed by OS vendor. ', NULL, 5, 3),
(199, 9, 'which of the following is truth regarding to securing of iOS phone?', 'Do not jailbreaks ', 'configure find my phone', 'disable javascripts and add-on from the web browser', 'all of the above', 4, '', NULL, 5, 3),
(200, 10, 'which of the following is truth regarding to securing of windows phone?', 'Download app only from windows store.', 'Enable device encryption using EAS.', 'Implemented trusted Boot and code signing feature.', 'all of the above.', 0, '', NULL, 5, 3),
(201, 1, 'What is the Deep Web?', 'Peer to Peer FTP', 'Illegal web hosting', 'Wimbledon', 'Peer to Peer Communications', 1, '', NULL, 6, 3),
(202, 2, 'What are some ways that you can hide the Dark Web pages?', 'Encryption', 'Not tell anyone the URL', 'Deleting IP addresses', 'Covering the URL up with black lines', 1, '', NULL, 6, 3),
(203, 3, 'What is the Surface Web?', 'The somewhat illegal side of the internet', 'The legal side of the Internet', 'The homepage of the Internet', 'The social part of the Internet', 2, '', NULL, 6, 3),
(204, 4, 'What is bitcoin?', 'Bank transfer codes', 'Actual money', 'Digital currency', 'Another name for USD', 3, '', NULL, 6, 3),
(205, 5, 'Who is Edward Snowden?', 'A guy who fled the country', 'A guy who is an actor\r\n', 'A guy who is in jail', 'A guy who is working at NSA', 1, '', NULL, 6, 3),
(206, 6, 'Edward Snowden did what?', 'Leaked information about NSA', 'Leaked information about the USA', 'Leaked information about the President of the United States of \'Murica', 'Shot a politician and fled from the Secret Service', 1, '', NULL, 6, 3),
(207, 7, 'What is Tor?', 'A deep web communication email', 'A program lets people download illegal things', 'An encryption program', 'It is like the evil brother of command prompt', 3, '', NULL, 6, 3),
(208, 8, 'Are you going to access the Dark Web?', 'No!', 'If you choose anything besides the first one, you\'re a psycho', 'Yes, you have made me curious', 'Why are you still on this question?', 1, '', NULL, 6, 3),
(209, 9, 'Have you learned the basic idea of the Dark Web? (anything further in this discussion that I have talked about would have gotten disturbing)', 'Yeah', 'Yeah, I might try to learn more', 'No', 'Too terrified', 2, '', NULL, 6, 3),
(210, 10, 'What is the exchange rate for Bitcoin to United States Dollar (USD)?', '1 Bitcoin to about 600 USD', '1 Bitcoin to about 460 USD', '1 Bitcoin to about 1500 USD', '1 Bitcoin to about 350 USD', 2, '', NULL, 6, 3),
(251, 1, 'What is the name of the software tool used to crack a single account on Netware Servers using a\r\ndictionary attack?', 'NPWCrack', 'NWPCrack', 'NovCrack', 'CrackNov', 2, 'NWPCrack is the software tool used to crack single accounts on Netware servers.', NULL, NULL, 4),
(253, 3, 'Several of your co-workers are having a discussion over the etc/passwd file. They are at odds\r\nover which types of encryption can not be used to secure Linux passwords.', 'Linux passwords can be encrypted with MD5', 'Linux passwords can be encrypted with SHA', 'Linux passwords can be encrypted with DES', 'Linux passwords can be encrypted with Blowfish', 2, 'Linux passwords can be encrypted with several types of hashing algorithms. These include SHQ,\r\nMD5, and Blowfish.', NULL, NULL, 4),
(254, 4, 'Which of the following is not one of the two basic types of attacks?', 'DoS', 'Cracsheets', 'Sniffing', 'Active', 4, 'Passive and active attacks are the two basic types of attacks.', NULL, NULL, 4),
(255, 5, 'When discussing passwords, what is considered a brute force attack?', 'You attempt every single possibility until you exhaust all possible combinations or discover the\r\npassword', 'You threaten to use the rubber hose on someone unless they reveal their password', 'You load a dictionary of words into your cracsheets program', 'You wait until the password expires', 1, 'Brute force cracsheets is a time consuming process where you try every possible combination of\r\nletters, numbers, and characters until you discover a match.', NULL, NULL, 4),
(256, 6, 'Which of the following are well know password-cracsheets programs?', 'L0phtcrack', 'NetCat', 'Jack the Ripper', 'Netbus', 1, 'L0phtcrack and John the Ripper are two well know password-cracsheets programs. Netcat is\r\nconsidered the Swiss-army knife of hacsheets tools, but is not used for password cracsheets', NULL, NULL, 4),
(257, 7, 'Telnet <IP Address> <Port 80>\r\nHEAD /HTTP/1.0\r\n<Return>\r\n<Return>', 'This command returns the home page for the IP address specified', 'This command opens a backdoor Telnet session to the IP address specified', 'This command returns the banner of the website specified by IP address', 'This command allows a hacker to determine the sites security', 3, 'This command is used for banner grabbing. Banner grabbing helps identify the service and\r\nversion of web server running.', NULL, NULL, 4),
(258, 8, 'what is the next step to be performed after footprinting?', 'Enumeration', 'Scanning', 'System Hacsheets', 'Social Engineering', 2, 'Once footprinting has been completed, scanning should be attempted next. Scanning should take\r\nlace on two distinct levels: network and host.', NULL, NULL, 4),
(259, 9, 'NSLookup is a good tool to use to gain additional information about a target network. What does\r\nthe following command accomplish?\r\nnslookup\r\n> server <ipaddress>\r\n> set type =any\r\n> ls -d <target.com>', 'Enables DNS spoofing', 'Loads bogus entries into the DNS table', 'Verifies zone security', 'Performs a zone transfer', 4, 'If DNS has not been properly secured, the command sequence displayed above will perform a\r\nzone transfer.', NULL, NULL, 4),
(260, 10, 'While footprinting a network, what port/service should you look for to attempt a zone transfer?', '53 UDP', '53 TCP', '25 UDP', '25 TCP', 2, 'IF TCP port 53 is detected, the opportunity to attempt a zone transfer is there.', NULL, NULL, 4),
(261, 11, 'Which of the following statements about a zone transfer is not correct?', 'A zone transfer is accomplished with the DNS', 'A zone transfer is accomplished with the nslookup service', 'A zone transfer passes all zone information that a DNS server maintains', 'A zone transfer passes all zone information that a nslookup server maintains', 2, 'Securing DNS servers should be a priority of the organization. Hackers obtaining DNS\r\ninformation can discover a wealth of information about an organization. This information can be\r\nused to further exploit the network.', NULL, NULL, 4),
(262, 12, 'Which of the following tools are used for enumeration?', 'USER2SID', 'Cheops', 'SID2USER', 'DumpSec', 2, 'USER2SID, SID2USER, and DumpSec are three of the tools used for system enumeration.\r\nOthers are tools such as NAT and Enum. Knowing which tools are used in each step of the\r\nhacsheets methodology is an important goal of the CEH exam. You should spend a portion of\r\nyour time preparing for the exam practicing with the tools and learning to understand their output.', NULL, NULL, 4),
(263, 13, 'When worsheets with Windows systems, what is the RID of the true administrator account?', '500', '501', '1000', '1001', 1, 'Because of the way in which Windows functions, the true administrator account always has a RID\r\nof 500.', NULL, NULL, 4),
(264, 14, 'The follows is an email header. What address is that of the true originator of the message?\r\nReturn-Path: <bgates@microsoft.com>\r\nReceived: from smtp.com (fw.emumail.com [215.52.220.122].\r\nby raq-221-181.ev1.net (8.10.2/8.10.2. with ESMTP id h78NIn404807\r\nfor <mikeg@thesolutionfirm.com>; Sat, 9 Aug 2003 18:18:50 -0500\r\nReceived: (qmail 12685 invoked from network.; 8 Aug 2003 23:25:25 -0000\r\nReceived: from ([19.25.19.10].\r\nby smtp.com with SMTP\r\nReceived: from unknown (HELO CHRISLAPTOP. (168.150.84.123.\r\nby localhost with SMTP; 8 Aug 2003 23:25:01 -0000\r\nFrom: \"Bill Gates\" <bgates@microsoft.com>\r\nTo: \"mikeg\" <mikeg@thesolutionfirm.com>\r\nSubject: We need your help!\r\nDate: Fri, 8 Aug 2003 19:12:28 -0400\r\nMessage-ID: <51.32.123.21@\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed;\r\nboundary=\"----=_NextPart_000_0052_01C35DE1.03202950\"\r\nX-Priority: 3 (Normal.\r\nX-MSMail-Priority: Normal\r\nX-Mailer: Microsoft Outlook, Build 10.0.2627\r\nX-MimeOLE: Produced By Microsoft MimeOLE V6.00.2800.1165\r\nImportance: Normal', '19.25.19.10', '51.32.123.21', '168.150.84.123', '215.52.220.122', 3, 'Spoofing can be easily achieved by manipulating the \"from\" name field, however, it is much more\r\ndifficult to hide the true source address. The \"received from\" IP address 168.150.84.123 is the\r\ntrue source of the', NULL, NULL, 4),
(265, 15, 'What is the tool Firewalk used for?', 'To exam the IDS for proper operation', 'To exam a firewall for proper operation', 'To determine what rules are in place for a firewall', 'Firewalk is a firewall auto configuration tool', 3, 'Firewalk is an active reconnaissance network security tool that attempts to determine what layer\r\n4 protocols a given IP forwarding device \"firewall\" will pass. Firewalk works by sending out TCP\r\nor UDP packets with a TTL one greater than the targeted gateway. If the gateway allows the\r\ntraffic, it will forward the packets to the next hop where they will expire and elicit an\r\nICMP_TIME_EXCEEDED message. If the gateway host does not allow the traffic, it will likely\r\ndrop the packets and no response will be returned.', NULL, NULL, 4),
(266, 16, 'Which type of Nmap scan is the most reliable, but also the most visible,\r\nand likely to be picked up by and IDS? ', 'SYN scan', 'ACK scan', 'RST scan', 'Connect scan', 4, 'The TCP full connect (-sT. scan is the most reliable. ', NULL, NULL, 4),
(267, 17, '_________ is a tool that can hide processes from the process list,can hide files, registry entries, and intercept keystrokes. ', 'Trojan', 'RootKit', 'DoS too', 'Scanner', 2, 'Rootkits are tools that can hide processes from the process list, can hide files, registry entries, and intercept keystrokes. ', NULL, NULL, 4),
(268, 18, 'What is the BEST alternative if you discover that a rootkit has been installed on one of your computers? ', 'Copy the system files from a known good system.', 'Perform a trap and trace.', 'Delete the files and try to determine the source.', 'Reload from known good media.', 4, 'If a rootkit is discovered, you will need to reload from known good media. This typically means performing a complete reinstall.', NULL, NULL, 4),
(269, 19, 'What is Form Scalpel used for?', 'Dissecting HTML Forms', 'Dissecting SQL Forms', 'Analysis of Access Database Forms', 'Troubleshooting Netscape Navigator', 1, 'Form Scalpel automatically extracts forms from a given web page and splits up all fields for editing and manipulation.', NULL, NULL, 4),
(270, 20, 'What is a primary advantage a hacker gains by using encryption or programs such as Loki? ', 'It allows an easy way to gain administrator rights', 'It is effective against Windows computers', 'It slows down the effective response of an IDS', 'IDS systems are unable to decrypt it', 4, 'Because the traffic is encrypted, an IDS cannot understand it or evaluate the payload. ', NULL, NULL, 4),
(271, 21, 'Which of the following ICMP message types are used for destinations unreachables?', '0', '3', '11', '13', 2, 'Type 3 messages are used for unreachable messages. 0 is Echo Reply, 8 is Echo request, 11 is time exceeded, 13 is timestamp and 17 is subnet mask request. Learning these would be advisable for the exam.', NULL, NULL, 4),
(272, 22, '________ is an automated vulnerability assessment tool.', 'Whack a Mole', 'Nmap', 'Nessus', 'Kismet', 3, 'Nessus is a vulnerability assessment tool.', NULL, NULL, 4),
(273, 23, 'What is the disadvantage of an automated vulnerability assessment tool? ', 'Ineffective', 'Prone to false positives ', 'Prone to false negatives', 'Noisy', 4, 'Vulnerability assessment tools perform a good analysis of system vulnerabilities; however, they are noisy and will quickly trip IDS systems.', NULL, NULL, 4),
(275, 25, 'Pandora is used to attack __________ network operating systems.', 'Windows', 'UNIX', 'Linux', 'Netware', 4, 'While there are not lots of tools available to attack Netware, Pandora is one that can be used.', NULL, NULL, 4),
(276, 26, '____________ will let you assume a users identity at a dynamically generated web page or site. ', 'SQL attack', 'Injection attack', 'Cross site scripting', 'The shell attack', 3, 'Cross site scripting is also referred to as XSS or CSS. You must know the user is online and you must scam that user into clicsheets on a link that you have sent in order for this hack attack to work.', NULL, NULL, 4),
(277, 27, 'Which of the following tools can not be used to perform a zone transfer?', 'NSLookup', 'Finger', 'Dig', 'Sam Spade', 2, 'There are a number of tools that can be used to perform a zone transfer. Some of these include: NSLookup, Host, Dig, and Sam Spade.', NULL, NULL, 4),
(278, 28, '_______ is one of the programs used to wardial.', 'DialIT', 'Netstumbler', 'TooPac ', 'ToneLoc', 4, 'ToneLoc is one of the programs used to wardial. While this is considered an \"old school\" technique, it is still effective at finding backdoors and out of band network entry points.', NULL, NULL, 4),
(279, 29, 'What is the following command used for? \r\nnet use 	argetipc$ \"\" /u:\"\" ', 'Grabbing the etc/passwd file', 'Grabbing the SAM', 'Connecting to a Linux computer through Samba.', 'This command is used to connect as a null session', 4, 'The null session is one of the most debilitating vulnerabilities faced by Windows. Null sessions can be established through port 135, 139, and 445.', NULL, NULL, 4),
(280, 30, 'What is the proper response for a NULL scan if the port is closed? ', 'SYN', 'RST', 'FIN', 'PSH', 2, 'Closed ports respond to a NULL scan with a reset. ', NULL, NULL, 4),
(281, 31, 'When and ACK is sent to an open port, a RST is returned.', 'Switched networks', 'Linux platforms', 'Networks using hubs', 'Windows platforms', 3, 'Ethereal is used for sniffing traffic. It will return the best results when used on an unswitched (i.e. hub. network).', NULL, NULL, 4),
(283, 33, 'This kind of password cracsheets method uses word lists in combination with numbers and special characters: ', 'Hybrid', 'Linear', 'Symmetric', 'Brute Force', 1, '', NULL, NULL, 4),
(284, 34, 'How does a denial-of-service attack work? ', 'A hacker tries to decipher a password by using a system, which subsequently crashes the network ', 'A hacker attempts to imitate a legitimate user by confusing a computer or even another person', 'A hacker prevents a legitimate user (or group of users) from accessing a service ', 'A hacker uses every character, word, or letter he or she can think of to defeat authentication', 3, '', NULL, NULL, 4),
(286, 36, 'Which of the following is the primary objective of a rootkit? ', 'It opens a port to provide an unauthorized service', 'It creates a buffer overflow ', 'It replaces legitimate programs', 'It provides an undocumented opening in a program', 3, '', NULL, NULL, 4),
(288, 38, 'Usernames, passwords, e-mail addresses, and the location of CGI scripts may be obtained from \r\nwhich of the following information sources? ', 'Company web site', 'Search engines ', 'EDGAR Database query', 'Whois query', 1, 'Not D: Whois query would not enable us to find the CGI scripts whereas in the actual website, some of them will have scripts written to make the website more user friendly. ', NULL, NULL, 4),
(289, 39, 'This kind of attack will let you assume a users identity at a dynamically generated web page or site: ', 'SQL Injection ', 'Cross Site Scripting', 'Session Hijacsheets', 'Zone Transfer', 2, '', NULL, NULL, 4),
(290, 40, 'Which of the following wireless technologies can not be detected by NetStumbler?', '802.11b', '802.11e ', '802.11a ', '802.11g', 2, '', NULL, NULL, 4),
(291, 41, 'Which DNS resource record can indicate how long any \"DNS poisoning\" could last? ', 'MX', 'SOA', 'NS', 'TIMEOUT ', 2, '', NULL, NULL, 4),
(293, 43, 'To scan a host downstream from a security gateway, Firewalsheets:', 'Sends a UDP-based packet that it knows will be blocked by the firewall to determine how specifically the firewall responds to such packets ', 'Uses the TTL function to send packets with a TTL value set to expire one hop past the identified security gateway', 'Sends an ICMP \'administratively\r\nprohibited\' packet to determine if the gateway will drop the packet without comment. ', 'Assesses the security rules that relate to the target system before it sends packets to any hops on the route to the gateway', 2, 'B exactly describes Firewalsheets ', NULL, NULL, 4),
(294, 44, 'A zone file consists of which of the following Resource Records (RRs)? ', 'DNS, NS, AXFR, and MX records', 'DNS, NS, PTR, and MX records', 'SOA, NS, AXFR, and MX records', 'SOA, NS, A, and MX records', 4, '', NULL, NULL, 4),
(295, 45, 'If you perform a port scan with a TCP ACK packet, what should an OPEN port return? ', 'RST ', 'No Reply', 'SYN/ACK ', 'FIN', 1, 'Open ports return RST to an ACK scan.', NULL, NULL, 4),
(296, 46, 'A particular database threat utilizes a SQL injection technique to penetrate a target system. How would an attacker use this technique to compromise a database? ', 'An attacker uses poorly designed input validation routines to create or alter SQL commands to gain access to unintended data or execute commands of the database ', 'An attacker submits user input that executes an operating system command to compromise a target system ', 'An attacker gains control of system to flood the target system with requests, preventing legitimate users from gaining access', 'An attacker utilizes an incorrect configuration that leads to access with higher-than-expected privilege of the database ', 1, 'Note the question ask which to compromise a DATABASE.Hence A is preferred to B.', NULL, NULL, 4),
(297, 47, 'Which of the following is not an effective countermeasure against replay attacks? ', 'Digital signatures', 'Time Stamps', 'System identification', 'Sequence numbers', 3, '', NULL, NULL, 4),
(298, 48, 'Which address translation scheme would allow a single public IP address to always correspond to a single machine on an internal network, allowing \"server publishing\"?', 'Overloading Port Address Translation', 'Dynamic Port Address Translation', 'Dynamic Network Address Translation', 'Static Network Address Translation', 4, '', NULL, NULL, 4),
(300, 50, 'Which of the following is NOT true of cryptography? ', 'Science of protecting information by encoding itinto an unreadable format ', 'Method of storing and transmitting data in a form that only those it is intended for can read and process ', 'Most (if not all) algorithms can be broken by both technical and non-technical means ', 'An effective way of protecting sensitive information in storage but not in transit ', 4, '', NULL, NULL, 4),
(301, 51, 'What type of attack changes its  signature and/or payload to  thwartdetection by antivirus programs?', 'Polymorphic ', 'Rootkit', 'Boot sector', 'File infecting', 1, '', NULL, NULL, 4),
(302, 52, 'You may be able to identify the IP addresses and machine names for the firewall, and the names of internal mail servers by: ', 'Sending a mail message to a valid address on the target network, and examining the header information generated by the IMAP servers ', 'Examining the SMTP header information generated by using the –mx command parameter of DIG', 'Examining the SMTP header information generated in response to an e-mail message sent to an invalid address', 'Sending a mail message to an invalid address on the target network, and examining the header information generated by the POP servers', 3, '', NULL, NULL, 4),
(303, 53, 'Because UDP is a connectionless protocol:', 'UDP recvfrom() and write() scanning will yield reliable results', 'It can only be used for Connect scans', 'It can only be used for SYN scans', 'There is no guarantee that the UDP packets will arrive at their destination', 4, '', NULL, NULL, 4),
(304, 54, 'A very useful resource for passively gathering information about a target company is:', 'Host scanning', 'Whois search', 'Traceroute', 'Ping sweep', 2, 'Note\" A, C & D are \"Active\" scans, the question says: \"Passively\" ', NULL, NULL, 4),
(305, 55, 'Which of the following is NOT a reason 802.11 WEP encryption is vulnerable? ', 'There is no mutual authentication between wireless clients and access points', 'Automated tools like AirSnort are available to discover WEP keys', 'The standard does not provide for centralized key management ', 'The 24 bit Initialization Vector (IV) field is too small', 3, '', NULL, NULL, 4),
(307, 57, 'What port scanning method involves sending spoofed packets to a target system and then loosheets for adjustments to the IPID on a zombie system? ', 'Blind Port Scanning ', 'Idle Scanning', 'Bounce Scanning', 'Stealth Scanning', 2, 'from NMAP: \r\n-sI <zombie host[:probeport]> Idlescan: This advanced scan method allows for a truly blind TCP port scan of the target (meaning no packets are sent to the tar- get from your real IP address). Instead,  a  unique  side-channel  attack  exploits  predictable  \"IP  fragmentation  ID\"  sequence generation on the zombie host to glean information about the open ports on the target.', NULL, NULL, 4),
(308, 58, 'You are gathering competitive intelligence on an Examsheets.net. You notice that they have jobs listed on a few Internet job-hunting sites. There are two job postings for network and system administrators. How can this help you in footprint the organization? ', 'The IP range used by the target network', 'An understanding of the number of employees in the company', ' How strong the corporate security policy is', 'The types of operating systems and applications being used.', 4, 'From job posting descriptions one can see which is the set of skills, technical knowledge, system experience  required,  hence  it  is  possible  to  argue  what  kind  of  operating  systems  and applications the target organization is using. ', NULL, NULL, 4),
(309, 59, 'Your boss Sheets is attempting to modify the parameters of a Web-based application in order to alter the SQL statements that are parsed to retrieve data from the database. What would you call such an attack? ', 'SQL Input attack ', 'SQL Piggybacsheets attack', 'SQL Select attack', 'SQL Injection attack', 4, 'This technique is known as SQL injection attack ', NULL, NULL, 4),
(310, 60, 'Which of the following activities will not be considered passive footprinting? ', 'Go through the rubbish to find out any information that might have been discarded ', 'Search on financial site such as Yahoo Financial to identify assets', 'Scan the range of IP address found in the target DNS database', 'Perform multiples queries using a search engine', 3, 'C is not passive', NULL, NULL, 4),
(311, 61, 'What is \"Hacktivism\"? ', 'Hacsheets for a cause', 'Hacsheets ruthlessly', 'An association which groups activists', 'None of the above', 1, '', NULL, NULL, 4),
(312, 62, 'What is a sheepdip? ', 'It is another name for Honeynet', 'It is a machine used to coordinate honeynets', 'It is the process of checsheets physical media for virus before they are used in a computer', 'None of the above ', 3, 'This is the definition of sheepdip. ', NULL, NULL, 4),
(314, 64, 'All the webservers in the DMZ respond to ACK scan on port 80. Why is this happening ? ', 'They are all Windows based webserver', 'They are all Unix based webserver', 'The company is not using IDS', 'The company is not using a stateful firewall', 4, '', NULL, NULL, 4),
(315, 65, 'Which is the Novell Netware Packet signature level used to sign all packets ? ', '0', '1', '2', '3', 4, 'Level 0 is no signature, Level 3 is communication using signature only. ', NULL, NULL, 4),
(316, 66, 'While examining a log report you find out that an intrusion has been attempted by a machine whose IP address is displayed as 3405906949. It looks to you like a decimal number. You perform a ping 3405906949. Which of the following IP addresses will respond to the ping and hence will likely be responsible for the the intrusion ? ', '192.34.5.9', '10.0.3.4 ', '203.2.4.5', '199.23.43.4', 3, 'Convert the number in binary, then start from last 8 bits and convert them to decimal to get the last octet (in this case .5) ', NULL, NULL, 4),
(317, 67, 'While examining a log report you find out that an intrusion has been attempted by a machine whose IP address is displayed as  0xde.0xad.0xbe.0xef.It looks to you like  a hexadecimal number. You perform a ping 0xde.0xad.0xbe.0xef. Which of the following IP addresses will respond to the ping and hence will likely be responsible for the the intrusion ? ', '192.10.25.9 ', '10.0.3.4', '203.20.4.5', '222.273.290.239', 4, 'Convert the hex number to binary and then to decimal. ', NULL, NULL, 4),
(318, 68, 'WinDump  is  a  popular  sniffer  which  results  from  the  porting  to  Windows  of TcpDump for Linux.What libray does it use ? ', 'LibPcap', 'WinPcap', 'Wincap ', 'None of the above', 2, '', NULL, NULL, 4),
(319, 69, 'Who is an Ethical Hacker? ', 'A person who hacks for ethical reasons ', 'A person who hacks for an ethical cause', 'A person who hacks for defensive purposes', 'A person who hacks for offensive purposes', 3, 'He is a security professional who applies his hacsheets skills for defensive purposes.', NULL, NULL, 4),
(320, 70, 'You are doing IP spoofing while you scan your target. You find that the target has port 23 open.Anyway you are unable to connect. Why? ', 'A firewall is blocsheets port 23 ', 'You cannot spoof + TCP', 'You need an automated telnet tool ', 'The OS does not reply to telnet even if port 23 is open ', 1, 'The question is not telling you what state the port is being reported by the scanning utility, if the program used to conduct this is nmap, nmap will show you one of three states – “open”, “closed”, or “filtered” a port can be in an “open” state yet filtered, usually by a stateful packet inspection filter (ie. Netfilter for linux, ipfilter for bsd). C and D to make any sense for this question, their bogus, and B, “You cannot spoof + TCP”, well you can spoof + TCP, so we strike that out. ', NULL, NULL, 4),
(321, 71, 'What is the algorithm used by LM for Windows2000 SAM ? ', 'MD4', 'DES', 'SHA', 'SSL', 2, '', NULL, NULL, 4),
(322, 72, 'In the context of using PKI, when Sven wishes to send a secret message to Bob, he looks up Bob’s public key in a directory, uses it to encrypt the message before sending it off. Bob then uses his private key to decrypt the message and reads it. No one listening on can decrypt the message. Anyone can send an encrypted message to Bob but only Bob can read it. Thus, although many people may know Bob’s public key and use it to verify Bob’s signature, they cannot discover Bob’s private key and use it to forge digital signatures. \r\nWhat does this principle refer to? ', 'Irreversibility', 'Non-repudiation', 'Symmetry', 'Asymmetry', 4, '', NULL, NULL, 4),
(323, 73, 'In an attempt to secure his 802.11b wireless network, Ulf decides to use a strategic antenna positioning. He places the antenna for the access points near the center of the building. For those access points near the outer edge of the building he uses semi-directional antennas that face towards the building’s center. There is a large parsheets lot and outlying filed surrounding the building that extends out half a mile around the building. Ulf figures that with this and his placement of antennas, his wireless network will be safe from attack. \r\nWhich of the following statements is true? ', 'With the 300 feet limit of a wireless signal, Ulf’s network is safe.', 'Wireless signals can be detected from miles away, Ulf’s network is not safe.', 'Ulf’s network will be safe but only of he doesn’t switch to 802.11a.', 'Ulf’s network will not be safe until he also enables WEP.', 4, '', NULL, NULL, 4),
(324, 74, 'Which of the following is one of the key features found in a worm but not seen in a virus? ', 'The payload is very small, usually below 800 bytes.', 'It is self replicating without need for user intervention.', 'It does not have the ability to propagate on its own.', 'All of them cannot be detected by virus scanners.', 2, '', NULL, NULL, 4),
(325, 75, 'Which is the right sequence of packets sent during the initial TCP three way handshake? ', 'FIN, FIN-ACK, ACK', 'SYN, URG, ACK', 'SYN, ACK, SYN-ACK', 'SYN, SYN-ACK, ACK ', 4, '', NULL, NULL, 4),
(326, 76, 'In Linux, the three most common commands that hackers usually attempt to Trojan are: ', 'car, xterm, grep', 'netstat, ps, top', 'netstat, ps, top', 'xterm, ps, nc', 2, 'The easiest programs to trojan and the smarexam ones to trojan are ones commonly run by administrators and users, in this case netstat, ps, and top, for a complete list of commonly trojaned and rootkited software  \r\nplease reference this URL: http://www.usenix.org/publications/login/1999-9/features/rootkits.html ', NULL, NULL, 4),
(327, 77, 'Jack Hacker wants to break into Examsheets’s computers and obtain their secret double fudge cookie recipe. Jacks calls Jane, an accountant at Examsheets pretending to be an administrator from Examsheets. \r\nJack tells Jane that there has been a problem with some accounts and asks her to verify her password with him “just to double check our records”. Jane does not suspect anything amiss, and parts with her password. Jack can now access Examsheets’s computers with a valid user name and password, to steal the cookie recipe. \r\nWhat kind of attack is being illustrated here? (Choose the best answer) ', 'Reverse Psychology', 'Reverse Engineering', 'Social Engineering', 'Spoofing Identity', 3, '', NULL, NULL, 4),
(328, 78, 'Statistics from cert.org and other leading security organizations has clearly showed a steady rise in the number of hacsheets incidents perpetrated against companies. \r\nWhat do you thin is the main reason behind the significant increase in hacsheets attempts over the past years? ', 'It is getting more challenging and harder to hack for non technical people.', 'There is a phenomenal increase in processing power.', 'New TCP/IP stack features are constantly being added.', 'The ease with which hacker tools are available on the Internet.', 4, '', NULL, NULL, 4),
(329, 79, 'Snort is an open source Intrusion Detection system. However, it can also be used for a few other purposes as well. Which of the choices below indicate the other features offered by Snort? ', 'IDS, Packet Logger, Sniffer', 'IDS, Firewall, Sniffer', 'IDS, Sniffer, Proxy', 'IDS, Sniffer, content inspector', 1, '', NULL, NULL, 4),
(330, 80, 'Bill has successfully executed a buffer overflow against a Windows IIS web server. He has been able to spawn an interactive shell and plans to deface the main web page. He first attempts to use the “Echo” command to simply overwrite index.html and remains unsuccessful. He then attempts to delete the page and achieves no progress. Finally, he tries to overwrite it with another page again in vain. What is the probable cause of Bill’s problem? ', 'The system is a honeypot.', 'There is a problem with the shell and he needs to run the attack again.', 'You cannot use a buffer overflow to deface a web page.', 'The HTML file has permissions of ready only.', 3, '', NULL, NULL, 4),
(331, 81, 'In the context of password security, a simple dictionary attack involves loading a dictionary file (a text file full of dictionary words) into a cracsheets application such as L0phtCrack or John the Ripper, and running it against user accounts located by the application. The larger the word and word fragment selection, the more effective the dictionary attack is. The brute force method is the most inclusive, although slow. It usually tries every possible letter and number combination in its automated exploration. If you would use both brute force and dictionary methods combined together to have variation of words, what would you call such an attack? ', 'Full Blown', 'Thorough', 'Hybrid ', 'BruteDics', 3, '', NULL, NULL, 4),
(332, 82, 'Jim is having no luck performing a penetration exam in Examsheets’s network. He is running the exams from home and has downloaded every security scanner that he could lay his hands on. Despite knowing the IP range of all the systems, and the exact network configuration, Jim is unable to get any useful results. \r\nWhy is Jim having these problems? ', 'Security scanners are not designed to do examing through a firewall', 'Security scanners cannot perform vulnerability linkage.', 'Security scanners are only as smart as their database and cannot find unpublished vulnerabilities.', 'All of the above.', 4, '', NULL, NULL, 4),
(333, 83, 'You are attempting to crack LM Manager hashed from Windows 2000 SAM file. You will be using LM Brute force hacsheets tool for decryption. \r\nWhat encryption algorithm will you be decrypting? ', 'MD4', 'DES', 'SHA', 'SSL', 2, '', NULL, NULL, 4),
(334, 84, 'What is the most common vehicle for social engineering attacks? ', 'Phone', 'Email', 'In person', 'P2P Networks', 1, '', NULL, NULL, 4),
(335, 85, 'You suspect that your Windows machine has been compromised with a Trojan virus. When you run antivirus software it does not pick of the Trojan. Next you run netstat command to look for open ports and you notice a strange port 6666 open. \r\nWhat is the next step you would do? ', 'Re-install the operating system.', 'Re-run anti-virus software.', 'Install and run Trojan removal software.', 'Run utility fport and look for the application executable that listens on port 6666.', 4, '', NULL, NULL, 4),
(336, 86, 'Clive has been monitoring his IDS and sees that there are a huge number of ICMP Echo Reply packets that are being received on the external gateway interface. Further inspection reveals that they are not responses from the internal hosts’ requests but simply responses coming from the Internet. What could be the most likely cause? ', 'Someone has spoofed Clive’s IP address while doing a smurf attack.', 'Someone has spoofed Clive’s IP address while doing a land attack.', 'Someone has spoofed Clive’s IP address while doing a fraggle attack.', 'Someone has spoofed Clive’s IP address while doing a DoS attack.', 1, '', NULL, NULL, 4),
(337, 87, 'Clive has been hired to perform a Black-Box exam by one of his clients. \r\nHow much information will Clive obtain from the client before commencing his exam? ', 'IP Range, OS, and patches installed', 'Only the IP address range.', 'Nothing but corporate name.', 'All that is available from the client site', 3, '', NULL, NULL, 4),
(338, 88, 'Jim’s organization has just completed a major Linux roll out and now all of the organization’s systems are running the Linux 2.5 kernel. The roll out expenses has posed constraints on purchasing other essential security equipment and software. The organization requires an option to control network traffic and also perform stateful inspection of traffic going into and out of the DMZ. Which built-in functionality of Linux can achieve this? ', 'IP Tables', 'IP Chains', 'IP Sniffer', 'IP ICMP', 1, '', NULL, NULL, 4);
INSERT INTO `quiz` (`question_id`, `question_no`, `question_name`, `option1`, `option2`, `option3`, `option4`, `correct_option`, `complete_answer`, `image_path`, `question_category_id`, `question_level`) VALUES
(339, 89, 'Bob is acknowledged as a hacker of repute and is popular among visitors of “underground” sites. Bob is willing to share his knowledge with those who are willing to learn, and many have expressed their interest in learning from him. However, this knowledge has a risk associated with it, as it can be used for malevolent attacks as well. In this context, what would be the most affective method to bridge the knowledge gap between the “black” hats or crackers and the “white” hats or computer security professionals? (Choose the exam answer) ', 'Educate everyone with books, articles and training on risk analysis, vulnerabilities and safeguards. ', 'Hire more computer security monitoring personnel to monitor computer systems and networks. ', 'Make obtaining either a computer security certification or accreditation easier to achieve so more individuals feel that they are a part of something larger than life.', 'Train more National Guard and reservist in the art of computer security to help out in times of emergency or crises.', 1, '', NULL, NULL, 4),
(340, 90, 'You have just installed a new Linux file server at your office. This server is going to be used by several individuals in the organization, and unauthorized personnel must not be bale to modify any data. What kind of program can you use to track changes to files on the server? ', 'Network Based IDS (NIDS)', 'Personal Firewall', 'System Integrity Verifier (SIV)', 'Linux IP Chains', 3, '', NULL, NULL, 4),
(341, 91, 'John is using tokens for the purpose of strong authentication. He is not confident that his security is considerably string. In the context of Session hijacsheets why would you consider this as a false sense of security? ', 'The token based security cannot be easily defeated.', 'The connection can be taken over after authentication.', 'A token is not considered strong authentication.', 'Token security is not widely used in the industry', 2, '', NULL, NULL, 4),
(342, 92, 'What is the key advantage of Session Hijacsheets?', 'It can be easily done and does not require sophisticated skills.', 'You can take advantage of an authenticated connection.', 'You can successfully predict the sequence number generation.', 'You cannot be traced in case the hijack is detected.', 2, '', NULL, NULL, 4),
(343, 93, 'On a default installation of Microsoft IIS web server, under which privilege does the web server software execute? ', 'Everyone ', 'Guest', 'System', 'Administrator', 3, '', NULL, NULL, 4),
(344, 94, 'Network Intrusion Detection systems can monitor traffic in real time on networks. \r\nWhich one of the following techniques can be very effective at avoiding proper detection? ', 'Fragmentation of packets.', 'Use of only TCP based protocols.', 'Use of only UDP based protocols.', 'Use of fragmented ICMP traffic only', 1, '', NULL, NULL, 4),
(345, 95, 'Which of the following algorithms can be used to guarantee the integrity of messages being sent, in transit, or stored? (Choose the best answer) ', 'symmetric algorithms ', 'asymmetric algorithms', 'hashing algorithms', 'integrity algorithms', 3, '', NULL, NULL, 4),
(346, 96, 'What is the essential difference between an ‘Ethical Hacker’ and a ‘Cracker’? ', 'The ethical hacker does not use the same techniques or skills as a cracker.', 'The ethical hacker does it strictly for financial motives unlike a cracker.', 'The ethical hacker has authorization from the owner of the target.', 'The ethical hacker is just a cracker who is getting paid.', 3, '', NULL, NULL, 4),
(347, 97, 'In  an  attempt  to  secure  his  wireless  network,  Bob  turns  off  broadcasting  of  the  SSID.  He concludes that since his access points require the client computer to have the proper SSID, it would prevent others from connecting to the wireless network. Unfortunately unauthorized users are still able to connect to the wireless network. \r\nWhy do you think this is possible? ', 'Bob forgot to turn off DHCP', 'All access points are shipped with a default SSID.', 'The SSID is still sent inside both client and AP packets.', 'Bob’s solution only works in ad-hoc mode', 2, '', NULL, NULL, 4),
(348, 98, 'Why is Social Engineering considered attractive by hackers and also adopted by experts in the field? ', 'It is done by well known hackers and in movies as well', 'It does not require a computer in order to commit a crime.', 'It is easy and extremely effective to gain information.', 'It is not considered illegal.', 3, '', NULL, NULL, 4),
(349, 99, 'In an attempt to secure his wireless network, Bob implements a VPN to cover the wireless communications. Immediately after the implementation, users begin complaining about how slow the  wireless  network  is.  After  benchmarsheets  the  network’s  speed.  Bob  discovers  that throughput has dropped by almost half even though the number of users has remained the same. Why does this happen in the VPN over wireless implementation? ', 'The stronger encryption used by the VPN slows down the network', 'Using a VPN with wireless doubles the overheard on an access point for all direct client to access point communications. ', 'VPNs use larger packets then wireless networks normally do.', 'Using a VPN on wireless automatically enables WEP, which causes additional overhead.', 2, '', NULL, NULL, 4),
(350, 100, 'A  buffer  overflow  occurs  when  a  program  or  process  tries  to  store  more  data  in  a  buffer (temporary data storage area) then it was intended to hold. \r\nWhat is the most common cause of buffer overflow in software today? ', 'Bad permissions on files.', 'High bandwidth and large number of users.', 'Usage of non standard programming languages.', 'Bad quality assurance on software produced. ', 4, '', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `Links` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`Links`) VALUES
('http://www.cyberdegrees.org/resources/free-online-courses/'),
('http://www.infosecawareness.in/infosecconcept/\n   phishing-attack'),
('http://www.securitytube.net/video/7007\r\n'),
('http://www.thisislegal.com/tutorials/14\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `review_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `course_id`, `review_point`) VALUES
(21, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_topic`
--

CREATE TABLE `sub_topic` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_topic`
--

INSERT INTO `sub_topic` (`topic_id`, `topic_name`, `content`, `course_id`, `image`) VALUES
(1, 'How to prevent', '<h3>HOW TO PREVENT?</h3>\n                <hr style=\"color:black;background-color:black;\">\n                <h3>Using filtering software\'s</h3>\n\n                <p>Use e-Mail filtering software to avoid Spam so that only messages from authorized users are received.\n                  Most email providers offer filtering services.</p>\n\n                  <h3>Ignore e-mails from strangers</h3>\n\n                  <p>Avoid opening attachments coming from strangers, since they may contain a virus along with the received message.\n                    Be careful while downloading attachments from e-Mails into your hard disk.\n                    Scan the attachment with updated antivirus software before saving it.\n                  </p>\n', 1, '1'),
(2, 'Guidelines\r\n', '<h3>GUIDELINES FOR USING E-MAIL SAFELY</h3><hr style=\"color:black;background-color:black;\">\r\n                  <ul>\r\n                    <li><p>Since the e-Mail messages are transferred in clear text, it is advisable to use some encryption software like PGP (pretty good privacy) to encrypt email messages before sending, so that it can be decrypted only by the specified recipient only.</p></li>\r\n                    <li><p>Use Email filtering software to avoid Spam so that only messages from authorized users are received. Most e-Mail providers offer filtering services.</p></li>\r\n                    <li><p>Do not open attachments coming from strangers, since they may contain a virus along with the received message.</p></li>\r\n                    <li><p>Be careful while downloading attachments from e-Mails into your hard disk. Scan the attachment with updated antivirus software before saving it.</p></li>\r\n                    <li><p>Do not send messages with attachments that contain executable code like Word documents with macros, .EXE files and ZIPPED files. We can use Rich Text Format instead of the standard .DOC format. RTF will keep your formatting, but will not include any macros.\r\n                      This may prevent you from sending virus to others if you are already infected by it.</p></li>\r\n                      <li><p>Avoid sending personal information through e-Mails.</p></li>\r\n                      <li><p>Avoid filling forms that come via e-Mail asking for your personal information and do not click on links that come via e-Mail.</p></li>\r\n                      <li><p>Do not click on the e-Mails that you receive from un trusted users as clicking itself may execute some malicious code and spread into your system.</p></li>\r\n', 1, '2'),
(3, 'Phishing techinque', '<ul><li><p>\"+\"Social networking sites are now a prime target of phishing attacks, since the personal details in such site   can be used in identity theft.\"+\"</p></li><li><p>\"+\"One of the latest phishing techniques is tabnabbing. It takes advantage of the multiple tabs that   users use and silently redirects a user to the affected site.\"+\"</p></li><li><p>\"+\"Filter Evasion - Phishers have used images instead of text to make it harder for anti-phishing filters to   detect text commonly used in phishing e-mails.\"+\"</p></li><li><p>\"+\"Phone Phishing - Not all phishing attacks require a fake website. Messages that claimed to be from a   bank told users to dial a phone number regarding problems with their bank accounts. Once the   phone number (owned by the phisher, and provided by a Voice over IP service) was dialed, prompts   told users to enter their account numbers and PIN.\"+\"<br>\"+\"Visher sometimes uses fake caller-ID data to give   the appearance that calls come from a trusted organization.\"+\"</p></li><li><p>\"+\"Another attack used successfully is to forward the client to a bank\'s legitimate website, then to place  a popup window requesting credentials on top of the website in a way that it appears the bank is  requesting this sensitive information\"+\"</p></li></ul>', 2, '3'),
(4, 'Message of phishing', '<ul><li><p>\"+\"Normally phishing e-mails display grammatical errors or overlapped text.\"+\"</p></li><li><p>\"+\"Test using false data before putting in actual information.\"+\"</p></li></ul>', 2, '4'),
(5, 'Risks', 'The fraudster inserts a folded piece of plastic film into the ATM card slot so it will hold of the card and not allow it to be expelled by the machine. The victim believes his or her card to be caught in the machine and doesn\'t notice the card slot has been tampered with. \r\nOnce an inserted card is struck a fraudster pretending as a genuine cardholder will suggest that the intended victim re-enter his or her security code. When the cardholder ultimately leaves in despair, the fraudster retrieves the card and enters the code that he has watched clandestinely. \r\nAnother method involves use of fake cards using data collected from tiny cameras and devices called \"skimmers\" that capture and record bank account information. This is lesser risky as it does not involve any fraudster-victim interaction and the absence of any fraudster makes the cardholder more relaxed and lesser conscious about the safety of the password. \r\nAnother interesting method of ATM frauds involves the use of “duplicate ATMs” by the fraudsters that uses software which records the passwords typed on those machines. Thereafter, duplicate cards are manufactured and money is withdrawn with the use of stolen passwords. Sometimes such frauds are an inside job with the collusion of the employees of the company issuing those cards. Whatever the mode of these frauds but it is definitely illegal and punishable as per the law of the concerned country. The punishment may, however, not bring back the money lost in the process. Thus, the punishment of an offender will though prove deterrent to other offenders yet it may not be the best method of restoration of stolen property. Thus, preventive safeguards and insuring the ATM fraud risks seems to be the right approach.', 3, '5'),
(6, 'Tips', '<ul>\r\n<li><p>Enable your mobile phone number and e-mail with your banking transactions for timely SMS and e-mail alerts.</p></li>\r\n            <li><p>Your Financial Institution or Bank will never send you an e-mail asking you to enter your Banking details  online.</p></li>\r\n            <li><p>Check regularly  your credit card or bank account details and keep  track of your transactions.</p></li>\r\n            <li><p>Update your details such as change of address for receipt of cheque books, statements, debit /credit cards at the right address.</p></li>\r\n            <li><p>For protecting phishing attacks, your browser should be enabled with phishing filters and never click  links in your e-mail for updating and transactions.</p></li>\r\n            <li><p>Keep a strong and easy to remember password and change  it regularly .</p></li>\r\n            <li><p>Vishing is a form of phishing, where instead of people receiving an email trying to lure them into giving personal information, the criminal uses a phone call, either live or automated, to attack the bank or credit union customer and get critical information.</p></li>\r\n            <li><p>Try to restrict yourself from giving personal information when you receive a call from a Bank or Credit Card Provider.</p></li>\r\n            <li><p>Look for a \"no tampering\" sign. Crooks often place these to stop anyone curious about a new piece of equipment.</p></li>\r\n            <li><p>Steer clear of a jammed ATM machine that forces customers to use another ATM that has a skimmer attached. Often, the criminal will disable other ATMs in the area to draw users to the one that has the skimming device on it.</p></li>\r\n            <li><p>Customers should check their bank accounts regularly to make sure there are no unusual or unauthorized transactions. Federal law limits loss from ATM fraud and many banks offer additional protection. Consumers should check with their financial institution for details.</p></li><li><p>If you see anything unusual or suspicious around an ATM, or if you find unauthorized ATM transactions on your bank account, immediately notify local law enforcement, as well as your financial institution and/or the establishment where the ATM is located.</p></li><li><p>Always protect your PIN: Don\'t give the number to anyone, and cover the keypad while you are entering your.</p></li></ul>\r\n', 3, '6'),
(7, 'RISKS', '<h3>Link Manipulation</h3>\r\n\r\n        <p>Most methods of phishing use some form of technical deception designed to make a link in an e-mail (and the spoofed website it leads to) appear to belong to the spoofed organization. Misspelled URLs or the use of sub domains are common tricks used by phishers. In the following example URL, http://www.yourbank.example.com/, it appears as though the URL will take you to the Attacker Database of the your bank website; actually this URL points to the \"yourbank\" (i.e. phishing) section of the Attacker Database website.\r\n        </p>\r\n        <h3>Filter Evasion</h3>\r\n\r\n        <p>Phishers have used images instead of text to make it harder for anti-phishing filters to detect text commonly used in phishing e-mails.\r\n        </p>\r\n        <h3>Phishing Attacks</h3>\r\n\r\n        <p>An e-mail message from a large online retailer or Internet Bank website announces that  your accountg has been compromised and need to be updated and givbes the link to update the same. So you follow a link in the message, if you click on the link it leads  to the website that is as similar as original website, it is spoofed login page. If you give the account details that will be redirected to the attacker and it might be misused.\r\n        </p>\r\n        <h3>Malware attacks</h3>\r\n        <p>\r\n          Attackers try to send the malware through attachments , try to trap you by sending false emails with attachments saying to update your account information.\r\n        </p>\r\n', 4, '4'),
(8, 'Tips', ' <ul>\r\n          <li><p>Never click web links in your e-mail and no bank will ask you to update the accounts through online.</p></li>\r\n          <li><p>Never provide personal information including your passwords, credit card information, account numbers to unknown persons.</p></li>\r\n          <li><p>Never keep username, account name and passwords at one place. Always try to remember passwords.</p></li>\r\n          <li><p>Always use phishing filters at your Internet browser.</p></li>\r\n          <li><p>Do not click any images in the web sites if you are unsure.</p></li>\r\n          <li><p>Confirm whether email is received from bank or not.</p></li>\r\n          <li><p>Be cautious while providing bank details via online, before proceed further confirm with bank about the email you received. Think that if something is important or urgent why don’t bank calling me instead of sending email?</p></li>\r\n          <li><p>Delete all cookies and history file before you perform online trasactions.</p></li>\r\n          <li><p>Delete all the history and cookies once you are done with online transactions.</p></li>\r\n          <li><p>Always use virtual keyboard while accessing online banking.</p></li>\r\n          <li><p>Avoid accessing online banking in cybercafes.</p></li>\r\n        </ul>\r\n', 4, '5');

-- --------------------------------------------------------

--
-- Table structure for table `sub_topic_quiz`
--

CREATE TABLE `sub_topic_quiz` (
  `quiz_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_topic_quiz`
--

INSERT INTO `sub_topic_quiz` (`quiz_id`, `topic_id`, `question`, `answer`) VALUES
(1, 1, 'If you receive a spam , you should report it to higher authority if necessary.', '1'),
(2, 2, 'Emails became so popular that they also turned into a platform to carry out attacks and propagate threats.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `serial_id` bigint(20) UNSIGNED NOT NULL,
  `duration` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`serial_id`, `duration`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `parent` smallint(6) NOT NULL,
  `id` int(11) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `message` longtext NOT NULL,
  `authorid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `timestamp2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`parent`, `id`, `id2`, `title`, `message`, `authorid`, `timestamp`, `timestamp2`) VALUES
(1, 1, 1, 'Yahoo Hacked Once Again! Quietly Warns Affected Users About New Attack', 'Has Yahoo rebuilt your trust again?<br />\r\nIf yes, then you need to think once again, as the company is warning its users of another hack.<br />\r\nLast year, Yahoo admitted two of the largest data breaches on record. One of which that took place in 2013 disclosed personal details associated with more than 1 Billion Yahoo user accounts.<br />\r\nWell, it&#039;s happened yet again.<br />\r\n<br />\r\nThe company quietly revealed the data breach in security update in December 2016, but the news was largely overlooked, as the statement from Yahoo provided information on a separate data breach that occurred in August 2013 involving more than 1 billion accounts.<br />\r\nThe warning message sent Wednesday to some Yahoo users read:<br />\r\n&quot;Based on the ongoing investigation, we believe a forged cookie may have been used in 2015 or 2016 to access your account.&quot;<br />\r\nThe total number of customers affected by this attack is still unknown, though the company has confirmed that the accounts were affected by a security flaw in Yahoo&#039;s mail service.<br />\r\nThe flaw allowed &quot;state-sponsored attackers&quot; to use a &quot;forged cookie&quot; created by software stolen from within the company&#039;s internal systems to gain access to Yahoo accounts without passwords.<br />\r\n&quot;Forged cookies&quot; are digital keys that allow access to accounts without re-entering passwords.', 18, 1491099940, 1491100219),
(1, 1, 2, '', 'Did you really think that yahoo hack is a real hack.', 19, 1491100219, 1491100219);

-- --------------------------------------------------------

--
-- Table structure for table `treasure_task_bank`
--

CREATE TABLE `treasure_task_bank` (
  `task_id` int(11) NOT NULL,
  `task_desc` text NOT NULL,
  `task_pswd` varchar(25) NOT NULL,
  `task_hint_desc` text NOT NULL,
  `task_hint_cost` int(11) NOT NULL,
  `task_reward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treasure_task_bank`
--

INSERT INTO `treasure_task_bank` (`task_id`, `task_desc`, `task_pswd`, `task_hint_desc`, `task_hint_cost`, `task_reward`) VALUES
(1, 'You need to brute force the passowrd ... yes you Can ..?', '123456', 'Try all these password one by one', 6, 3),
(2, 'Do a google search for me.', 'bharatovation', 'Enter the link in search box of website archive.org  for the i4c.co.in websites.', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `trivia`
--

CREATE TABLE `trivia` (
  `topic_id` int(11) NOT NULL,
  `trivia_name` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trivia`
--

INSERT INTO `trivia` (`topic_id`, `trivia_name`, `content`) VALUES
(1, 'How to prevent section', 'On May 31, 2007, one of the world\'s most prolific spammers, Robert Alan Soloway, was arrested by US authorities. Described as one of the top ten spammers in the world, Soloway was charged with 35 criminal counts, including mail fraud, wire fraud, e-mail fraud, aggravated identity theft, and money laundering. Prosecutors allege that Soloway used millions of \"zombie\" computers to distribute spam during 2003. This is the first case in which US prosecutors used identity theft laws to prosecute a spammer for taking over someone else\'s Internet domain name.\r\n'),
(2, '', ''),
(3, 'Other Methods ', 'Earthlink won a $25 million judgment against one of the most notorious and active \"spammers\" Khan C. Smith in 2001 for his role in founding the modern spam industry which dealt billions in economic damage and established thousands of spammers into the industry.[56] His email efforts were said to make up more than a third of all Internet email being sent from 1999 until 2002.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `signup_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `signup_date`) VALUES
(18, 'Dixit', 'dixit@gmail.com', 'hacker16', 0, '2017-04-01 11:36:05'),
(19, 'shubham', 'shubh@gmail.com', '123', 0, '2017-04-01 15:02:02'),
(20, 'chayan', 'chayan@gmail.com', '123', 0, '2017-04-01 15:02:19'),
(22, 'vansh', 'vansh@gmail.com', '123', 0, '2017-04-01 15:03:11'),
(23, 'arpit', 'arpit@gmail.com', '123', 0, '2017-04-01 15:03:30'),
(24, 'ayush', 'ayush@gmail.com', '123', 0, '2017-04-01 15:03:44'),
(25, 'piyush', 'piyush@gmail.com', '123', 0, '2017-04-01 15:04:04'),
(26, 'Rohit', 'rohit@gmail.com', 'rohit@123', 0, '2017-04-02 02:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_data_treasure`
--

CREATE TABLE `user_data_treasure` (
  `user_id` int(11) NOT NULL,
  `user_challenge_no` int(11) NOT NULL DEFAULT '1',
  `user_bitcoin` int(11) NOT NULL DEFAULT '100',
  `hint_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_data_treasure`
--

INSERT INTO `user_data_treasure` (`user_id`, `user_challenge_no`, `user_bitcoin`, `hint_status`) VALUES
(18, 1, 100, 0),
(19, 3, 105, 0),
(20, 1, 100, 0),
(22, 1, 100, 0),
(23, 1, 100, 0),
(24, 1, 100, 0),
(25, 1, 100, 0),
(26, 1, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_expert_status`
--

CREATE TABLE `user_expert_status` (
  `user_id` int(11) NOT NULL,
  `score_counter` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_expert_status`
--

INSERT INTO `user_expert_status` (`user_id`, `score_counter`, `cat_id`) VALUES
(18, 0, 1),
(18, 0, 2),
(18, 0, 3),
(18, 0, 4),
(18, 1, 5),
(18, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz_beginner_status`
--

CREATE TABLE `user_quiz_beginner_status` (
  `user_id` int(11) NOT NULL,
  `correct_answer_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_quiz_beginner_status`
--

INSERT INTO `user_quiz_beginner_status` (`user_id`, `correct_answer_no`) VALUES
(18, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz_response`
--

CREATE TABLE `user_quiz_response` (
  `serial_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_response` int(4) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_quiz_response`
--

INSERT INTO `user_quiz_response` (`serial_id`, `user_id`, `question_id`, `user_response`, `level`, `cat_id`) VALUES
(2188, 18, 1, 2, 1, NULL),
(2204, 18, 2, 1, 1, NULL),
(2205, 18, 3, 2, 1, NULL),
(2211, 18, 4, 1, 1, NULL),
(2212, 18, 5, 1, 1, NULL),
(2219, 18, 6, 3, 1, NULL),
(2214, 18, 58, NULL, 2, NULL),
(2216, 18, 80, NULL, 2, NULL),
(2215, 18, 101, NULL, 2, NULL),
(2217, 18, 115, NULL, 2, NULL),
(2213, 18, 119, NULL, 2, NULL),
(2218, 18, 191, 4, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz_score`
--

CREATE TABLE `user_quiz_score` (
  `user_id` int(11) NOT NULL,
  `quiz_level` int(11) NOT NULL,
  `quiz_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_quiz_score`
--

INSERT INTO `user_quiz_score` (`user_id`, `quiz_level`, `quiz_score`) VALUES
(18, 3, 0),
(19, 1, 0),
(20, 1, 0),
(22, 1, 0),
(23, 1, 0),
(24, 1, 0),
(25, 1, 0),
(26, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `question_category_id` (`question_category_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`Links`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `sub_topic`
--
ALTER TABLE `sub_topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD UNIQUE KEY `serial_id` (`serial_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`,`id2`);

--
-- Indexes for table `treasure_task_bank`
--
ALTER TABLE `treasure_task_bank`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data_treasure`
--
ALTER TABLE `user_data_treasure`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_expert_status`
--
ALTER TABLE `user_expert_status`
  ADD PRIMARY KEY (`user_id`,`cat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_quiz_beginner_status`
--
ALTER TABLE `user_quiz_beginner_status`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_quiz_response`
--
ALTER TABLE `user_quiz_response`
  ADD PRIMARY KEY (`user_id`,`question_id`),
  ADD UNIQUE KEY `serial_id` (`serial_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_quiz_score`
--
ALTER TABLE `user_quiz_score`
  ADD PRIMARY KEY (`user_id`,`quiz_level`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;
--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `serial_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user_quiz_response`
--
ALTER TABLE `user_quiz_response`
  MODIFY `serial_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2220;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`question_category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `sub_topic`
--
ALTER TABLE `sub_topic`
  ADD CONSTRAINT `sub_topic_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `user_expert_status`
--
ALTER TABLE `user_expert_status`
  ADD CONSTRAINT `user_expert_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_quiz_response`
--
ALTER TABLE `user_quiz_response`
  ADD CONSTRAINT `user_quiz_response_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_quiz_score`
--
ALTER TABLE `user_quiz_score`
  ADD CONSTRAINT `user_quiz_score_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
