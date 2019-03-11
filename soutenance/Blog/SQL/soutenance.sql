-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 11 mars 2019 à 09:32
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `soutenance`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `pass` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `register` tinyint(1) NOT NULL,
  `date_user` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UC_admin` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `pass`, `mail`, `register`, `date_user`) VALUES
(80, 'monsieur', 'azerty', 'fzef@fzef', 1, '2019-03-07 12:29:42');

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE IF NOT EXISTS `commentary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentary` text NOT NULL,
  `register_valid` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `date_com` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=301 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentary`
--

INSERT INTO `commentary` (`id`, `commentary`, `register_valid`, `id_post`, `date_com`, `name`) VALUES
(260, 'lol', 1, 81, '2019-03-07 11:34:51', 'monsieur'),
(261, 'lol', 1, 80, '2019-03-07 11:36:29', 'monsieur'),
(271, 'Selon les temps et les lieux, les relations entre Dieu et César, pour simplifier entre l\'Église et l\'État, ont leur météorologie. Depuis 2 000 ans, elles ont connu des périodes sombres, comme les persécutions du iii e siècle, ou plus lumineuses, à certaines époques de la chrétienté, le plus souvent des moments mêlant coopération et rivalité, confiance et suspicion. L\'histoire de ces relations en France est bien connue. Après la grande rupture de 1789, les va-et-vient du xix e siècle, la confrontation et la séparation de la IIIe République, les relations s\'apaisent après le...\r\n\r\nPar François Daguet', 1, 81, '2019-03-08 14:22:38', 'henry'),
(270, 'lol', 1, 81, '2019-03-07 16:50:14', 'Gaetan Henry'),
(266, 'kiuki', 1, 80, '2019-03-07 14:58:59', 'monsieur'),
(273, 'moi', 1, 81, '2019-03-08 14:35:10', 'monsieur'),
(274, 'lui', 1, 81, '2019-03-08 14:35:48', 'monsieur'),
(299, '&lt;strong&gt;lol&lt;/strong&gt;', 1, 82, '2019-03-08 16:26:00', 'monsieur'),
(300, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 82, '2019-03-08 16:33:24', 'monsieur'),
(298, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 82, '2019-03-08 16:25:21', 'monsieur'),
(296, 'kjhkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 1, 82, '2019-03-08 16:18:44', 'monsieur'),
(297, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 1, 82, '2019-03-08 16:19:19', 'l;ol');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `contained` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_post` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `chapo`, `contained`, `author`, `date_post`) VALUES
(81, 'paris Eternal', 'Paris Eternal a son tout premier match de la nouvelle saison de l\'Overwatch League ce samedi 16 février à 21h. À cette occasion, l\'entraîneur de l\'équipe, Julien Ducros, donne à Numerama son sentiment avant la rencontre contre London Spitfire.', 'Le samedi 16 février est une journée à marquer d’une pierre blanche pour la scène de l’esport, en tout cas au niveau hexagonal. C’est en effet à cette date que la toute jeune équipe de Paris Eternal va faire ses grands débuts au sein de l’Overwatch League, la plus relevée de toutes les compétitions que propose Blizzard avec ce jeu de tir à la première personne — à l’exception de la Coupe du monde, qui mobilise des équipes nationales.\r\n\r\nDes débuts qui pourraient s’avérer en réalité compliqués, car pour son premier match de la saison régulière, qui a débuté le 14 février, en pleine Saint-Valentin, Paris Eternal va avoir droit à un très gros client : London Spitfire, l’équipe qui a remporté la saison inaugurale de la Ligue Overwatch l’an passé. Une équipe qui d’ailleurs n’aligne que des Sud-Coréens, une nationalité qui s’est forgée au fil des ans une redoutable réputation dans le domaine du sport électronique.', 'league', '2019-03-01 10:53:51'),
(67, 'Les paris eternal', 'Deuxième match, et deuxième victoire pour l\'équipe Française Paris Eternal, qui a remporté hier soir son match face à Los Angeles Gladiators.', 'Après la victoire face à London Spitfire, Paris Eternal affrontait ce samedi 23 février, l\'équipe Los Angeles Gladiators qui était en 1-1 dans cette Overwatch League. Cette équipe Américaine avait perdu son premier match face à Seoul Dynasty sur le score de 3-1 et avait remporté l\'équipe San Francisco Shock lors de leur deuxième match.\r\n\r\nLe début de ce match entre Paris et Los Angeles a très vite tourné à l\'avantage de l\'équipe Américaine qui a remporté 2-1 la première manche sur Népal.\r\nLa réaction de Paris Eternal ne se fait pas attendre, puisque l\'équipe de la Capitale remporte la deuxième manche sur le score de 3-2 sur Numbani. La troisième manche sur Temple d\'anubis se solde par une égalité parfaite 3-3 et dirige ainsi les deux équipes vers une quatrième et dernière manche qui sera décisive.\r\n\r\nEt c\'est sur Dorado que Paris réussit à remporter ce match sur un score une nouvelle fois très serré 3-2.\r\nC\'était un sacré match, @LAGladiators a si joué si bien honnêtement, vraiment fier de mon équipe. On se les fait !\r\nParis Eternal est donc actuellement en 2-0 dans cette Overwatch League et affrontera le samedi 2 mars Atlanta Reign.', 'dexerto', '2019-02-26 09:57:53'),
(88, 'Harcèlement sexuel : plusieurs femmes portent plainte contre un journaliste du «Monde»', 'Après avoir reçu des photos de nu d\'un journaliste du «Monde», huit femmes du secteur de la communication ont porté plainte ce mercredi pour violence psychologique et harcèlement sexuel. Atteint d\'une maladie neurodégénérative, l\'homme a été suspendu mi-février par sa direction. Son traitement médical pourrait être la cause de son comportement.', 'Après avoir reçu des photos de nu d\'un journaliste du «Monde», huit femmes du secteur de la communication ont porté plainte ce mercredi pour violence psychologique et harcèlement sexuel. Atteint d\'une maladie neurodégénérative, l\'homme a été suspendu mi-février par sa direction. Son traitement médical pourrait être la cause de son comportement.\r\n  Harcèlement sexuel : plusieurs femmes portent plainte contre un journaliste du «Monde»\r\n«Je me souviens, j’étais en train de bosser, je bosse souvent très tard de chez moi.» Il est 23h53, le 22 avril 2017, quand Fanny Bouton, qui conseille des marques high-tech dans leur stratégie marketing, reçoit un message sur Facebook. Il est signé d’un journaliste du Monde, avec qui elle n’est pas «amie» mais partage 203 contacts. «Dans le milieu, on se file des tuyaux, des contacts. Et puis c’est un journaliste du Monde, alors je ne me pose pas de questions, je clique.»\r\n\r\nLe message contient juste un lien vers Flickr, réseau de partage de photos ou de vidéos en ligne. Elle clique dessus. Apparaissent alors plusieurs photos, en noir et blanc, que Libération a pu consulter. Sur plusieurs d’entre elles, l’homme apparaît intégralement nu. Sur deux clichés, il tient son sexe dans ses mains.\r\n\r\nLa consultante ne répond pas. Le journaliste lui envoie alors, dans la foulée, un autre message. «Oups, j’ai ripé. Désolé, je suis rouge de honte et de confusion.» Fanny Bouton ne répond toujours pas, fait plusieurs captures d’écran, «au cas où», qu’elle range dans un dossier sur son ordinateur. Puis retourne travailler.\r\n\r\n«Dis-moi comment tu me trouves»\r\nEntre avril et décembre 2017, 15 autres femmes, au moins, toutes attachées de presse, ont reçu sur Facebook ce même lien Flickr, avec les mêmes photos. A chaque fois, le journaliste faisait croire à des piratages informatiques, savamment mis en scène, ou à une erreur de destinataire. Ainsi, Margaux (1) a reçu le message suivant : «Hello Karine, j’ai un peu honte mais une promesse est une promesse. Dis-moi comment tu me trouves, et tu auras peut-être le droit d’en voir d’autres. Bises.» Dans cette conversation, que nous avons pu consulter, le journaliste s’excuse ensuite pour l’erreur d’envoi (à Margaux, au lieu de «Karine»), avant d’essayer de s’assurer que la jeune femme avait bien vu ses photos, surtout celles où il apparaît nu.\r\n\r\nFanny et Margaux ne sont pas les seules à avoir été victimes de ces «erreurs d’envoi». Quelque temps plus tard, il contactait Elisabeth (1) : «Marianne, ma jolie Marianne, je ne l’aurais fait pour personne d’autre mais pour toi j’ai cédé. Voici les photos que tu me réclames depuis si longtemps.» Avec le même lien Flickr, les mêmes excuses et les mêmes questions pour savoir si, oui ou non, la victime avait regardé les photos les plus «osées».\r\n\r\nAvant Flickr, et dès 2013, le journaliste avait déjà envoyé des photos de lui nu à une autre attachée de presse, via une autre plateforme de photos, Foomeo.\r\n\r\nHuit des femmes visées ont déposé plainte ce mercredi, toutes pour violences psychologiques. Quatre d’entre elles ont aussi porté plainte pour harcèlement sexuel. «Ce sont celles qui ont reçu les messages à plusieurs reprises. Le harcèlement nécessite une répétition du comportement, et c’est le cas pour quatre des plaignantes», explique à Libération leur avocate, Me Valentine Rebérioux.\r\n\r\nAppel à témoignage\r\nC’est le 12 février, en pleine affaire de la ligue du LOL, que les choses se sont accélérées. A 1h17 du matin, après avoir déjà eu connaissance de deux cas similaires au sien, Fanny Bouton poste le message suivant sur Facebook :\r\n\r\n«Hey les filles journalistes et RP [relations publiques, ndlr], avez-vous déjà reçu d’un journaliste du Monde des photos de lui nu ? Soi-disant par erreur via Messenger. On est déjà trois à avoir eu affaire à lui. But, déposer une plainte commune sans lynchage sur les réseaux sociaux et montrer qu’on peut ne pas rester isolée face à ce genre d’individu. On va agir avec civisme.»\r\n\r\nTrès rapidement, les témoignages affluent. «Le lendemain matin, j’ai 4-5 réponses, et en fin de journée, j’ai déjà une dizaine de personnes qui décrivent toutes la même chose.»\r\n\r\nAu lendemain de son appel à témoignages sur Facebook, la consultante reçoit un nouveau message sur Messenger. Il est cette fois-ci signé Jérôme Fenoglio, directeur du Monde, qui prend le sujet au sérieux. Il souhaite échanger avec elle pour en savoir plus sur cette affaire.\r\n\r\nContacté par Libération, Jérôme Fenoglio confirme : «Dès qu’on a eu connaissance de cet appel à témoignage, on a décidé une mise à pied conservatoire du salarié.» Une enquête interne a également été ouverte. Convoqué fin février par sa direction pour un entretien dans le cadre de cette enquête, le journaliste n’a toutefois pas pu se présenter.\r\n\r\nEffets secondaires\r\nAtteint d’une maladie neurodégénérative depuis maintenant plusieurs années, il est actuellement hospitalisé et sous traitement médical depuis plusieurs années. Et pour la famille du journaliste, «c’est poussé par l’action de ces substances qu’il a envoyé ces messages inappropriés à plusieurs femmes», selon un mail rédigé par sa compagne et transmis à Libération. L’hypersexualité, ou augmentation importante de la libido, fait en effet partie des effets secondaires possibles du traitement de cette maladie.\r\n\r\nPour autant, la plainte a bien été déposée. A Libération, Valentine Rebérioux explique : «Ce sera à un expert médical de déterminer si ces messages ont été envoyés à cause du traitement reçu par le journaliste. Mais dans le cas où ces messages ne viseraient que des femmes attachées de presse, cela constituerait un effet secondaire très spécifique.»\r\n\r\nCela explique pourquoi l’avocate ou les plaignantes ne souhaitent pas, depuis le début de cette affaire, communiquer sur l’identité du journaliste. «L’idée, ce n’est pas de faire \"la ligue du LOL 2\". C’est un cas très différent, un cas isolé, explique l’avocate des huit femmes. Nous voulons que la justice puisse agir en toute sérénité, en dehors de tout lynchage médiatique. Nous voulons aussi protéger le mis en cause et ses proches, tant qu’il n’y aura pas de réponse judiciaire apportée.»', 'Par Robin Andraca ', '2019-03-11 09:19:01'),
(80, 'Overwatch Contenders Paris Eternal Academy : composition, roster, logo', 'Paris Eternal est l\'une des huit équipes présentes à la saison 1 des Contenders Overwatch 2019. Retrouvez la liste des joueurs, ainsi que toutes les informations concernant l\'équipe d\'Eternal Academy.', 'Composition de l\'équipe actuelle\r\n\r\nArtem ', 'Artem ', '2019-03-11 09:15:59'),
(82, 'Les Paris Eternal', 'UN CONTEXTE FAVORABLE', 'Mais cette première affiche n’alarme pas plus que ça Julien Ducros, alias Daemon. L’entraîneur français de l’équipe parisienne, que Numerama a pu rencontrer à Los Angeles dans la gaming house de Paris Eternal deux jours avant le match, se dit « très confiant » sur ce que sont capablesq de proposer les dix joueurs de l’effectif pour la saison à venir. « Quand je regarde nos derniers entraînements, je vois que cela se passe très bien », confie-t-il au moment où ses poulains sont en train de prendre l’ascendant sur un match d’entraînement contre une autre équipe de l’Overwatch League.\r\n\r\nIl faut dire que la pression psychologique est avant tout du côté de London Spitfire : Paris Eternal n’a rien à perdre : le collectif n’a aucun titre à défendre, aucun rang à tenir, aucun prestige à assurer. Tout reste à écrire. L’important en réalité, c’est surtout de ne pas passer à côté du match, même si cela se solde par une défaite. London Spitfire est dans une configuration différente au regard de son palmarès de l’an passé et surtout à cause de son entrée ratée dans la compétition, avec un premier match perdu.\r\n\r\nLe match d’ouverture a en fait été la réédition de la finale contre Philadelphia Fusion (une équipe dans laquelle joue un Français, Gaël Gouzerch, alias Poko). L’équipe américaine a pu prendre sa revanche cette année contre les « Londoniens » en leur infligeant un score final de 3 à 1. Cela ne dit évidemment rien du classement final qu’occupera London Spitfire à la fin de la saison, mais les voilà à devoir composer avec un faux pas d’entrée de jeu et de devoir maintenant enchaîner avec une équipe dont ils ne connaissent rien.\r\n\r\nEt surtout, c’est du pain béni pour Paris, car le staff a pu voir comment jouait Londres dans un vrai match de compétition : quels sont les joueurs qui ont été alignés, quels ont été les personnages sélectionnés, quelles stratégies ont été déployées et quelles positions ont été occupées sur les différentes cartes. Et il n’est pas fréquent que les stratégies changent du tout au tout d’un match à l’autre. Cela ne bouge que lorsque la méta (basiquement, l’équilibrage du jeu) évolue au gré des correctifs.\r\n\r\nToutefois, cela ne changera pas nécessairement les six qui seront retenus pour le premier match. « On a déjà une composition qui est déjà plus ou moins décidée et elle devrait demeurer pour la première phase de la compétition, si la méta ne change pas », explique Daemon, lorsqu’on lui demande s’il a déjà une équipe-type. Les grandes lignes ont déjà été fixées il y a quelquesu temps de cela, en accord avec les autres membres du staff — Julien Ducros affirme beaucoup consulter ses collègues avant de trancher.\r\n\r\nMaintenant, c’est sur le terrain que tout cela va se jouer. Et les London Spitfire ne sont qu’un match parmi de nombreux autres qui ponctueront la saison. Quand on lui demande quelles sont les équipes de l’Overwatch League qui sont difficiles à jouer, en tout cas dans celles que Paris Eternal a pu rencontrer pendant ses entraînements — les équipes de la Ligue ne s’entraînent quasiment qu’entre elles –, trois noms reviennent dans la bouche de Julien Ducros.Il y a New York Excelsior, que le coach parisien décrit comme étant « très constante, très propre dans sa façon de jouer, avec beaucoup de stabilité et d’intelligence ». Il y a aussi Hangzhou Spark, qui est une équipe « extrêmement novatrice, que l’on a vu tester beaucoup de choses et qui s’est montrée très intéressante ». Enfin, il y a Los Angeles Valiant, une équipe qui « sait s’adapter, qui sait bosser et qui a de très bons résultats en entraînement ».\r\n\r\nL’on notera que ces trois équipes comptent beaucoup de joueurs sud-coréens (qui est la nationalité la plus répandue dans la Ligue). Il n’y a que ça chez New York Excelsior et ils occupent presque tous les postes chez Hangzhou Spark. Ils sont aussi majoritaires chez Los Angeles Valiant. On compte en tout vingt équipes dans l’Overwatch League, réparties de manière équivalente entre les divisions Atlantique et Pacifique. Paris est la seule équipe liée à l’Europe, avec Londres.\r\n\r\nEn visitant la gaming house, qui était alors investie par les joueurs pour une énième après-midi d’entraînement, Julien Ducros a fait savoir que Paris Eternal « a un très bon ratio » de victoires par rapport aux défaites. « On a une équipe qui performant très, très bien à l’entraînement », déclare-t-il, même si ce n’est pas ce qu’il recherche en priorité. Ce qu’il attend de ses joueurs, c’est qu’ils appliquent les consignes établies avant le match et qu’ils se détachent des résultats eux-mêmes.\r\n\r\n« Aujourd’hui, si un joueur se concentre trop sur la victoire ou la défaite, il va être affecté et cela peut se répercuter sur son entraînement, et par conséquent ses coéquipiers et les résultats du groupe », met-il en garde. « Le résultat n’est juste que la partie visible de l’iceberg ». Là où il faut se focaliser, c’est sur le degré d’application de la tactique et ce que cela a pu produire en jeu.« C’est là-dessus que j’entends beaucoup insister, surtout dans un contexte où 80 % de ton temps concerne entraînement. Je n’ai pas envie d’entendre quoi que ce soit sur la victoire ou la défaite dans ces créneaux-là. Ce n’est pas l’important », argue-t-il. « Je préfère avoir une équipe qui applique exactement ce qu’on a dit en entraînement ou qui essaie d’appliquer les stratégies, qui donne son maximum et qui perd, plutôt qu’une équipe qui semble vraiment laxiste et qui se retrouve à faire un résultat en compétition très mauvais contre une équipe qui est censée être moins bonne ».\r\n\r\nIl reste maintenant à passer de la théorie à la pratique pour les dix joueurs de l’équipe parisienne — qui est composée de quatre Français et de six Européens, une particularité qui n’a pas manqué d’être soulignée depuis que l’effectif a été dévoilé, fin octobre 2018. « aujourd’hui, je pense qu’on est prêt, pour quoi qu’il puisse se passer pendant le match », insiste Daemon, en pointant du doigt que les dix compétiteurs ont fait de belles choses à l’entraînement, même lorsque le schéma de jeu était différent de ce à quoi ils sont habitués.Mais au-delà de ce premier match, l’enjeu pour Paris Eternal sera surtout de savoir comment se terminera l’aventure de cette première année. Si bien sûr toutes les équipes ont pour ambition officielle de finir en tête du championnat, le coach parisien admet qu’il sera déjà satisfaisant de se placer au milieu du tableau. « Je pense que pour une équipe comme la nôtre, si on atteint le top 10 en saison régulière, ça sera bien. Ça sera un bon résultat général, surtout par rapport aux attentes du public et de la scène professionnelle ».\r\n\r\nL’intéressé a toutefois nuancé son propos : « je ne me fixe pas formellement un objectif spécifique. la seule chose que je veux faire, c’est me focaliser sur la saison et au bout du neuvième mois voir le résultat et établir un constat ». Et, forcément, tirer les conclusions qui s’imposeront. Et surtout, Daemon tiendra compte du respect de la stratégie. « Si on arrive à un milieu de tableau sans appliquer tout ce qu’on avait prévu, là je ne serai pas content, même si c’est un top 5 ».\r\n\r\n« Le bilan ne sera bon que si tout ce qui a été envisagé a été appliqué. C’est pour cela que je ne donne jamais d’importance aux résultats et que j’essaie d’inculquer aux joueurs de faire de même  », écrit Julien Ducros. C’est la condition pour « accéder à un meilleur classement », assure l’homme de 22 ans, qui a été dans une autre vie assistant coach pour Los Angeles Valiant. Il reste à savoir si le haut du tableau sera accessible à ses dix joueurs. Un début de réponse surviendra donc à 21h, heure française, contre London Spitfire.', 'blizzard', '2019-03-07 09:59:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
