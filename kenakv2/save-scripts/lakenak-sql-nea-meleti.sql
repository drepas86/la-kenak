DROP TABLE kataskeyi_an_a;

CREATE TABLE `kataskeyi_an_a` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_toixoy` int(5) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `anoig_mikos` decimal(7,5) DEFAULT NULL,
  `anoig_ypsos` decimal(7,5) DEFAULT NULL,
  `anoig_u` decimal(7,5) DEFAULT NULL,
  `anoig_eidos` int(2) DEFAULT NULL,
  `anoig_aerismos` decimal(6,5) DEFAULT NULL,
  `anoig_lampas` decimal(7,5) DEFAULT NULL,
  `anoig_ankat` decimal(7,5) DEFAULT NULL,
  `x` decimal(7,5) DEFAULT NULL,
  `y` decimal(7,5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;




DROP TABLE 
kataskeyi_an_b;

CREATE TABLE `kataskeyi_an_b` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_toixoy` int(5) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `anoig_mikos` decimal(7,5) DEFAULT NULL,
  `anoig_ypsos` decimal(7,5) DEFAULT NULL,
  `anoig_u` decimal(7,5) DEFAULT NULL,
  `anoig_eidos` int(2) DEFAULT NULL,
  `anoig_aerismos` decimal(6,5) DEFAULT NULL,
  `anoig_lampas` decimal(7,5) DEFAULT NULL,
  `anoig_ankat` decimal(7,5) DEFAULT NULL,
  `x` decimal(7,5) DEFAULT NULL,
  `y` decimal(7,5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_an_d;

CREATE TABLE `kataskeyi_an_d` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_toixoy` int(5) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `anoig_mikos` decimal(7,5) DEFAULT NULL,
  `anoig_ypsos` decimal(7,5) DEFAULT NULL,
  `anoig_u` decimal(7,5) DEFAULT NULL,
  `anoig_eidos` int(2) DEFAULT NULL,
  `anoig_aerismos` decimal(6,5) DEFAULT NULL,
  `anoig_lampas` decimal(7,5) DEFAULT NULL,
  `anoig_ankat` decimal(7,5) DEFAULT NULL,
  `x` decimal(7,5) DEFAULT NULL,
  `y` decimal(7,5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_an_n;

CREATE TABLE `kataskeyi_an_n` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_toixoy` int(5) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `anoig_mikos` decimal(7,5) DEFAULT NULL,
  `anoig_ypsos` decimal(7,5) DEFAULT NULL,
  `anoig_u` decimal(7,5) DEFAULT NULL,
  `anoig_eidos` int(2) DEFAULT NULL,
  `anoig_aerismos` decimal(6,5) DEFAULT NULL,
  `anoig_lampas` decimal(7,5) DEFAULT NULL,
  `anoig_ankat` decimal(7,5) DEFAULT NULL,
  `x` decimal(7,5) DEFAULT NULL,
  `y` decimal(7,5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_an_s;

CREATE TABLE `kataskeyi_an_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plaisio` varchar(255) NOT NULL,
  `ukoyf` varchar(255) NOT NULL,
  `platos` varchar(255) NOT NULL,
  `pane` varchar(255) NOT NULL,
  `upane` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_an_s VALUES("1","Συνθετικό πλαίσιο - PVC - 2 θάλαμοι","2.2","","Διπλός υαλοπίνακας  4-12-4  χωρίς επίστρωση χαμηλής εκπομπής και αέρα στο διάκενο","2.8");
INSERT INTO kataskeyi_an_s VALUES("2","Συνθετικό πλαίσιο - PVC - 2 θάλαμοι","2.2","","Διπλός υαλοπίνακας  4-12-4  χωρίς επίστρωση χαμηλής εκπομπής και αέρα στο διάκενο","2.8");



DROP TABLE kataskeyi_dap;

CREATE TABLE `kataskeyi_dap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(62) DEFAULT NULL,
  `emvadon` decimal(7,4) DEFAULT NULL,
  `u` decimal(7,4) DEFAULT NULL,
  `b` decimal(2,1) NOT NULL,
  `bathos` decimal(5,2) NOT NULL,
  `perimetros` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_drawing;

CREATE TABLE `kataskeyi_drawing` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `floor` int(2) DEFAULT NULL,
  `item` int(2) DEFAULT NULL,
  `rec` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;




DROP TABLE 
kataskeyi_floors;

CREATE TABLE `kataskeyi_floors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_ground;

CREATE TABLE `kataskeyi_ground` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `emvadon` decimal(5,2) NOT NULL,
  `u` decimal(5,2) NOT NULL,
  `k_bathos` decimal(5,2) NOT NULL,
  `a_bathos` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_hm;

CREATE TABLE `kataskeyi_hm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `value` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_hm VALUES("1","Θέρμανση (τιμή από μελέτη θέρμανσης)","thermansi","5210");
INSERT INTO kataskeyi_hm VALUES("2","Κλιματισμός (τιμή από μελέτη κλιματισμού)","klimatismos","2300");



DROP TABLE kataskeyi_meletis;

CREATE TABLE `kataskeyi_meletis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` varchar(256) NOT NULL,
  `place` varchar(256) NOT NULL,
  `owner` varchar(256) NOT NULL,
  `engs` varchar(256) NOT NULL,
  `owner_status` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `contact_type` int(11) NOT NULL,
  `contact_name` varchar(256) NOT NULL,
  `contact_tel` varchar(256) NOT NULL,
  `contact_mail` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_meletis VALUES("1","","","","","1","","0","","","");



DROP TABLE kataskeyi_meletis_topo;

CREATE TABLE `kataskeyi_meletis_topo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sxedio` varchar(256) NOT NULL,
  `odos` varchar(256) NOT NULL,
  `apostaseis` varchar(256) NOT NULL,
  `klisi` varchar(256) NOT NULL,
  `prosb` int(11) NOT NULL,
  `pol_grafeio` varchar(256) NOT NULL,
  `pol_year` varchar(256) NOT NULL,
  `pol_number` varchar(256) NOT NULL,
  `pol_year_complete` varchar(256) NOT NULL,
  `pol_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_meletis_topo VALUES("1","εντός","κοινοτική","10","30","0","","","","","0");



DROP TABLE kataskeyi_oro;

CREATE TABLE `kataskeyi_oro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(62) DEFAULT NULL,
  `emvadon` decimal(7,4) DEFAULT NULL,
  `u` decimal(7,4) DEFAULT NULL,
  `b` decimal(2,1) NOT NULL,
  `f_hor_h` decimal(3,2) NOT NULL,
  `f_hor_c` decimal(3,2) NOT NULL,
  `f_ov_h` decimal(3,2) NOT NULL,
  `f_ov_c` decimal(3,2) NOT NULL,
  `f_fin_h` decimal(3,2) NOT NULL,
  `f_fin_c` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;




DROP TABLE 
kataskeyi_skiaseis_an_a;

CREATE TABLE `kataskeyi_skiaseis_an_a` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `id_an` int(2) DEFAULT NULL,
  `f_hor_h` decimal(7,6) DEFAULT NULL,
  `f_hor_c` decimal(7,6) DEFAULT NULL,
  `f_ov_h` decimal(7,6) DEFAULT NULL,
  `f_ov_c` decimal(7,6) DEFAULT NULL,
  `f_fin_h` decimal(7,6) DEFAULT NULL,
  `f_fin_c` decimal(7,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_skiaseis_an_b;

CREATE TABLE `kataskeyi_skiaseis_an_b` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `id_an` int(2) DEFAULT NULL,
  `f_hor_h` decimal(7,6) DEFAULT NULL,
  `f_hor_c` decimal(7,6) DEFAULT NULL,
  `f_ov_h` decimal(7,6) DEFAULT NULL,
  `f_ov_c` decimal(7,6) DEFAULT NULL,
  `f_fin_h` decimal(7,6) DEFAULT NULL,
  `f_fin_c` decimal(7,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_skiaseis_an_d;

CREATE TABLE `kataskeyi_skiaseis_an_d` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `id_an` int(2) DEFAULT NULL,
  `f_hor_h` decimal(7,6) DEFAULT NULL,
  `f_hor_c` decimal(7,6) DEFAULT NULL,
  `f_ov_h` decimal(7,6) DEFAULT NULL,
  `f_ov_c` decimal(7,6) DEFAULT NULL,
  `f_fin_h` decimal(7,6) DEFAULT NULL,
  `f_fin_c` decimal(7,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_skiaseis_an_n;

CREATE TABLE `kataskeyi_skiaseis_an_n` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `id_an` int(2) DEFAULT NULL,
  `f_hor_h` decimal(7,6) DEFAULT NULL,
  `f_hor_c` decimal(7,6) DEFAULT NULL,
  `f_ov_h` decimal(7,6) DEFAULT NULL,
  `f_ov_c` decimal(7,6) DEFAULT NULL,
  `f_fin_h` decimal(7,6) DEFAULT NULL,
  `f_fin_c` decimal(7,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;




DROP TABLE 
kataskeyi_skiaseis_t_a;

CREATE TABLE `kataskeyi_skiaseis_t_a` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `id_toixoy` int(2) DEFAULT NULL,
  `f_hor_h` decimal(7,6) DEFAULT NULL,
  `f_hor_c` decimal(7,6) DEFAULT NULL,
  `f_ov_h` decimal(7,6) DEFAULT NULL,
  `f_ov_c` decimal(7,6) DEFAULT NULL,
  `f_fin_h` decimal(7,6) DEFAULT NULL,
  `f_fin_c` decimal(7,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_skiaseis_t_b;

CREATE TABLE `kataskeyi_skiaseis_t_b` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `id_toixoy` int(2) DEFAULT NULL,
  `f_hor_h` decimal(7,6) DEFAULT NULL,
  `f_hor_c` decimal(7,6) DEFAULT NULL,
  `f_ov_h` decimal(7,6) DEFAULT NULL,
  `f_ov_c` decimal(7,6) DEFAULT NULL,
  `f_fin_h` decimal(7,6) DEFAULT NULL,
  `f_fin_c` decimal(7,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_skiaseis_t_d;

CREATE TABLE `kataskeyi_skiaseis_t_d` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `id_toixoy` int(2) DEFAULT NULL,
  `f_hor_h` decimal(7,6) DEFAULT NULL,
  `f_hor_c` decimal(7,6) DEFAULT NULL,
  `f_ov_h` decimal(7,6) DEFAULT NULL,
  `f_ov_c` decimal(7,6) DEFAULT NULL,
  `f_fin_h` decimal(7,6) DEFAULT NULL,
  `f_fin_c` decimal(7,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_skiaseis_t_n;

CREATE TABLE `kataskeyi_skiaseis_t_n` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `id_toixoy` int(2) DEFAULT NULL,
  `f_hor_h` decimal(7,6) DEFAULT NULL,
  `f_hor_c` decimal(7,6) DEFAULT NULL,
  `f_ov_h` decimal(7,6) DEFAULT NULL,
  `f_ov_c` decimal(7,6) DEFAULT NULL,
  `f_fin_h` decimal(7,6) DEFAULT NULL,
  `f_fin_c` decimal(7,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;




DROP TABLE 
kataskeyi_stoixeia;

CREATE TABLE `kataskeyi_stoixeia` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `zwni` varchar(1) DEFAULT NULL,
  `climate_data` int(2) DEFAULT NULL,
  `xrisi` int(2) DEFAULT NULL,
  `nero_dikt` int(2) DEFAULT NULL,
  `velt_klisi` int(2) DEFAULT NULL,
  `iliakos` int(2) DEFAULT NULL,
  `anigmeni_thermo` int(11) NOT NULL,
  `aytomatismoi` int(11) NOT NULL,
  `kaminades` int(11) NOT NULL,
  `eksaerismos` int(11) NOT NULL,
  `anem_orofis` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO 
kataskeyi_stoixeia VALUES("1","a","9","1","10","14","8","165","0","0","0","0");



DROP TABLE kataskeyi_teyxos;

CREATE TABLE `kataskeyi_teyxos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` varchar(250) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_teyxos VALUES("1","intro1","Η  εκπόνηση μελέτης ενεργειακής απόδοσης είναι υποχρεωτική, βάσει του νόμου 3661/2008 «Μέτρα για τη μείωση της ενεργειακής κατανάλωσης των κτιρίων και άλλες διατάξεις» (ΦΕΚ Α 89) , για όλα τα νέα ή ριζικά ανακαινιζόμενα κτίρια με τις εξαιρέσεις του άρθρου 11, όπως αυτός τροποποιήθηκε σύμφωνα με τα άρθρα 10 και 10Α του νόμου 3851/2010. Η μελέτη ενεργειακής απόδοσης εκπονείται βάσει του Κανονισμού Ενεργειακής Απόδοσης Κτηρίων – Κ.Εν.Α.Κ. \n\n(Φ.Ε.Κ. Β407/9.4.2010) και τις Τεχνικές Οδηγίες του Τεχνικού Επιμελητηρίου Ελλάδας που συντάχθηκαν υποστηρικτικά του κανονισμού  όπως  αυτές  ισχύουν  επικαιροποιημένες. Ειδικότερα, η μελέτη ενεργειακής απόδοσης βασίζεται στις εξής Τ.Ο.Τ.Ε.Ε. : 20701-1/2010:  «Αναλυτικές  Εθνικές  Προδιαγραφές  παραμέτρων  για  τον  υπολογισμό  της ενεργειακής απόδοσης κτιρίων και την έκδοση πιστοποιητικού ενεργειακής απόδοσης», 20701-2/2010: «Θερμοφυσικές ιδιότητες δομικών υλικών και έλεγχος της θερμομονωτικής επάρκειας των κτιρίων»,20701-3/2010: «Κλιματικά δεδομένα ελληνικών πόλεων».");
INSERT INTO kataskeyi_teyxos VALUES("2","intro2","Η ενσωμάτωση παθητικών ηλιακών συστημάτων (Π.Η.Σ.) πέραν του άμεσου κέρδους, εγκαταστάσεων ανανεώσιμων πηγών ενέργειας (Α.Π.Ε.) και συστημάτων συμπαραγωγής ηλεκτρισμού – θέρμανσης (Σ.Η.Θ.) θα καλυφθεί στην αμέσως επόμενη φάση με την έκδοση των ακόλουθων Τ.Ο.Τ.Ε.Ε. που θα καθορίσουν με σαφήνεια τις παραμέτρους και τις προδιαγραφές των σχετικών μελετών – εγκαταστάσεων : 20701-Χ/2010: «Βιοκλιματικός σχεδιασμός».20701-Χ/2010: «Εγκαταστάσεις Α.Π.Ε. σε κτίρια».20701-Χ/2010: «Εγκαταστάσεις Σ.Η.Θ. σε κτίρια». Σύμφωνα με την εγκύκλιο οικ.1603/4.10.2010: «Για την καλύτερη δυνατή εφαρμογή των απαιτήσεων της παραγράφου 1 του άρθρου 8 «Σχεδιασμός Κτιρίου», απαιτείται συστηματική προσέγγιση των αρχών του βιοκλιματικού σχεδιασμού του κτιρίου με επαρκή τεχνική τεκμηρίωση, στη βάση της διαθέσιμης βιβλιογραφίας και έως την έκδοση σχετικής Τ.Ο.Τ.Ε.Ε. Στην περίπτωση που αποδεδειγμένα υπάρχουν αρκετοί περιορισμοί (πολεοδομικού, τεχνικού, αισθητικού, οικονομικού χαρακτήρα, κ.ά.) που ενδεχομένως αποκλείουν την εφαρμογή της βέλτιστης ενεργειακά λύσης, υποβάλλεται υποχρεωτικά Τεχνική Έκθεση, η οποία θα τεκμηριώνει επαρκώς τους λόγους μη εφαρμογής κάθε μίας από τις περιπτώσεις της παραγράφου 1 του άρθρου 8.");
INSERT INTO kataskeyi_teyxos VALUES("3","intro3","Στόχος της ενεργειακής μελέτης είναι η ελαχιστοποίηση κατά το δυνατόν της κατανάλωσης ενέργειας για την σωστή λειτουργία του κτιρίου, μέσω: του βιοκλιματικού σχεδιασμού του κτηριακού κελύφους, αξιοποιώντας τη θέση του κτηρίου ως προς τον περιβάλλοντα χώρο, την ηλιακή διαθέσιμη ακτινοβολία ανά προσανατολισμό όψης, κ.ά., της θερμομονωτικής επάρκειας του κτηρίου με την κατάλληλη εφαρμογή θερμομόνωσης στα αδιαφανή δομικά στοιχεία	αποφεύγοντας κατά το δυνατόν τη δημιουργία θερμογεφυρών, καθώς και την επιλογή κατάλληλων κουφωμάτων, δηλαδή συνδυασμό υαλοπίνακα αλλά και πλαισίου, της επιλογής κατάλληλων ηλεκτρομηχανολογικών συστημάτων υψηλής απόδοσης, για την κάλυψη των αναγκών σε θέρμανση, ψύξη, κλιματισμό, φωτισμό και ζεστό νερό χρήσης με την κατά το δυνατόν ελάχιστη κατανάλωση (ανηγμένης) πρωτογενούς ενέργειας, της  χρήσης  τεχνολογιών  ανανεώσιμων  πηγών  ενέργειας  (Α.Π.Ε.)  όπως,  ηλιοθερμικά συστήματα, φωτοβολταϊκά συστήματα, γεωθερμικές αντλίες θερμότητας (εδάφους, υπόγειων και επιφανειακών νερών) κ.ά. και της εφαρμογής διατάξεων αυτομάτου ελέγχου της λειτουργίας των ηλεκτρομηχανολογικών εγκαταστάσεων, για τον περιορισμό της άσκοπης χρήσης τους.");
INSERT INTO kataskeyi_teyxos VALUES("4","genikiperigrafi","Πρόκειται για νέα ισόγεια κατοικία .");
INSERT INTO kataskeyi_teyxos VALUES("5","genikastoixeiaktirioy","Το υπό μελέτη κτίριο έχει ανεγερθεί  σε εντός σχεδίου περιοχή, στο ______________________________________________.  Πρόκειται  για ισόγειο κτίριο το οποίο έχει κύρια χρήση κατοικίας και στη φάση αυτή διαμορφώνεται το ισόγειό του σε διαμέρισμα. Εκτός από τους χώρους κύριας χρήσης ,η είσοδος καθώς και το κλιμακοστάσιο θα θεωρηθούν θερμαινόμενοι χώροι. Το ωράριο λειτουργίας του κτηρίου προσαρμόζεται στην χρήση της κατοικίας και λαμβάνεται όπως ορίζεται στην Τ.Ο.Τ.Ε.Ε. 20701-1/2010");
INSERT INTO kataskeyi_teyxos VALUES("6","topografiaoikopedoy","Το οικόπεδο  στο οποίο έχει ανεγερθεί το κτίριο είναι ορθογωνικού σχήματος με τον μεγάλο του άξονα από Βορά προς Νότο. Το οικόπεδο είναι γωνιακό και  βρίσκεται  σε εκτός σχεδίου  περιβάλλον. Στον  ευρύτερο περιβάλλοντα  χώρο  δεν υπάρχουν  κτιριακές  κατασκευές,  κυρίως κτίρια κατοικιών μέγιστου ύψους που να συμβάλουν στη σκίαση από τον ορίζοντα όπως φαίνεται στο τοπογραφικό διάγραμμα. Ειδικότερα: \n\nΤο γήπεδο όπου το κτίριο συνδέεται με _________ οδό , όπως φαίνεται και στο Τοπογραφικό  διάγραμμα. Το κτίριο απέχει αποστάσεις περί τα ____ μέτρα από τα όρια των όμορων οικοπέδων και ως εκ τούτου, υφίσταται περίπτωση κάλυψης ή σκίασής του από διπλανά κτίρια. Η θέση του κτιρίου γενικά ευνοεί τον ηλιασμό, όλων των χώρων αυτού. Δίνεται τοπογραφικό με την ακριβή θέση του κτιρίου στο οικόπεδο και φαίνονται οι αποστάσεις που θα έχει σε σχέση με πιθανά του γειτονικά κτήρια.\n\n\n\n");
INSERT INTO kataskeyi_teyxos VALUES("7","tekmiriwsi1","Σύμφωνα με το άρθρο 8 του Κ.Εν.Α.Κ. το κτίριο πρέπει να σχεδιασθεί λαμβάνοντας υπόψη : την χωροθέτηση του κτιρίου και τον προσανατολισμό του στο οικόπεδο, την εσωτερική χωροθέτηση χώρων λόγω λειτουργιών του κτιρίου,  την κατάλληλη χωροθέτηση των ανοιγμάτων για επαρκή ηλιασμό, φυσικό φωτισμό και φυσικό δροσισμό καθώς και την ηλιοπροστασία τους,  την ενσωμάτωση τουλάχιστον  ενός παθητικού ηλιακού συστήματος, ενός εκ των οποίων δύναται να είναι το σύστημα του άμεσου κέρδους,  διαμόρφωση του περιβάλλοντα χώρου για τη βελτίωση του μικροκλίματος.");
INSERT INTO kataskeyi_teyxos VALUES("8","tekmiriwsi2","Αδυναμία εφαρμογής των ανωτέρω απαιτεί επαρκή τεκμηρίωση, σύμφωνα πάντα με το Κ.Εν.ΑΚ.");
INSERT INTO kataskeyi_teyxos VALUES("9","tekmiriwsi3","Ακόμη, σύμφωνα με το άρθρο 11 του Κ.Εν.Α.Κ. τα περιεχόμενα της ενεργειακής μελέτης τα οποία λαμβάνονται υπόψη και για τον ενεργειακό σχεδιασμό είναι τα ακόλουθα:");
INSERT INTO kataskeyi_teyxos VALUES("10","tekmiriwsi4","1. γεωμετρικά χαρακτηριστικά του κτιρίου και των ανοιγμάτων (κάτοψη, όγκος, επιφάνεια, προσανατολισμός, συντελεστές σκίασης κ.α.),");
INSERT INTO kataskeyi_teyxos VALUES("11","tekmiriwsi5","2. τεκμηρίωση  της  χωροθέτησης  και  του  προσανατολισμού του κτιρίου για τη μέγιστη αξιοποίηση  των τοπικών κλιματικών συνθηκών, με  διαγράμματα  ηλιασμού  λαμβάνοντας υπόψη την περιβάλλουσα δόμηση,");
INSERT INTO kataskeyi_teyxos VALUES("12","tekmiriwsi6","3. τεκμηρίωση της επιλογής και χωροθέτησης της φύτευσης και άλλων στοιχείων βελτίωσης του μικροκλίματος,");
INSERT INTO kataskeyi_teyxos VALUES("13","tekmiriwsi7","4. τεκμηρίωση του σχεδιασμού και χωροθέτησης των ανοιγμάτων ανά προσανατολισμό ανάλογα με τις απαιτήσεις  ηλιασμού, φωτισμού και αερισμού (ποσοστό, τύπος και εμβαδόν διαφανών επιφανειών ανά προσανατολισμό),");
INSERT INTO kataskeyi_teyxos VALUES("14","tekmiriwsi8","5. Χωροθέτηση των λειτουργιών ανάλογα με τη χρήση και τις απαιτήσεις άνεσης και ποιότητας εσωτερικού  περιβάλλοντος (θερμικές, φυσικού αερισμού και φωτισμού),");
INSERT INTO kataskeyi_teyxos VALUES("15","tekmiriwsi9","6.  περιγραφή λειτουργίας των παθητικών συστημάτων για τη χειμερινή και θερινή περίοδο: υπολογισμός επιφάνειας  παθητικών ηλιακών συστημάτων άμεσου και έμμεσου κέρδους (κατακόρυφης / κεκλιμένης / οριζόντιας επιφάνειας), για τα συστήματα με μέγιστη απόκλιση έως  30ο από το νότο, καθώς και του ποσοστού αυτής επί της αντίστοιχης συνολικήςεπιφάνειας της όψης,");
INSERT INTO kataskeyi_teyxos VALUES("16","tekmiriwsi10","7. περιγραφή των συστημάτων ηλιοπροστασίας του κτηρίου ανά προσανατολισμό: διαστάσεις και υλικά κατασκευής, τύπος (σταθερά / κινητά, οριζόντια / κατακόρυφα, συμπαγή / διάτρητα) και ένδειξη του προκύπτοντος ποσοστού σκίασης για την 21η Δεκεμβρίου  (χειμερινό ηλιοστάσιο: μικρότερη διάρκεια ημέρας και χαμηλότερηθέση ήλιου) και την 21η  Ιουνίου, (θερινό ηλιοστάσιο: μεγαλύτερη διάρκεια ημέρας  και υψηλότερη θέση  ήλιου).");
INSERT INTO kataskeyi_teyxos VALUES("17","tekmiriwsi11","8. γενική περιγραφή των τεχνικών εκμετάλλευσης του φυσικού φωτισμού.");
INSERT INTO kataskeyi_teyxos VALUES("18","tekmiriwsi12","9. σχεδιαστική απεικόνιση με κατασκευαστικές λεπτομέρειες της θερμομονωτικής στρώσης, των παθητικών συστημάτων και των συστημάτων ηλιοπροστασίας στα αρχιτεκτονικά σχέδια του κτιρίου (κατόψεις, όψεις, τομές).");
INSERT INTO kataskeyi_teyxos VALUES("19","xwrothetisiktirioy","Όπως αναφέρθηκε, το κτίριο έχει ανεγερθεί ________ σχεδίου ιστού του ______________________________  επιτρέποντας ουσιαστικά την βέλτιστη εφαρμογή των βασικών αρχών της βιοκλιματικής αρχιτεκτονικής. Ο σχεδιασμός και η διαμόρφωση του ισογείου θα γίνει με τέτοιο τρόπο ούτως ώστε να γίνει  δυνατή η εκμετάλλευση των βασικών κλιματικών παραμέτρων.\n\n");
INSERT INTO kataskeyi_teyxos VALUES("20","xwrothetisileitoyrgiwn","Ο εσωτερικός σχεδιασμός  και  οι διαμόρφωση  των χώρων στο κτίριο, έγιναν με γνώμονα τη μέγιστη  εκμετάλλευση ή την αποφυγή της ηλιακής ακτινοβολίας ανάλογα με την εποχή. Οι κύριοι χώροι θα τοποθετηθούν στο νότιο  προσανατολισμό, ενώ στον ανατολικό θα τοποθετηθούν οι κουζίνες ούτως ώστε κατά τους χειμερινούς μήνες να γίνει δυνατή  η αξιοποίηση της ηλιακής ακτινοβολίας τις πρωινές ώρες, ενώ κατά τους θερινούς μήνες να είναι ευχάριστη η χρήση των  χώρων προτού η εξωτερική θερμοκρασία να ανέβει αισθητά. Τα δωμάτια θα τοποθετηθούν στους δυτικούς προσανατολισμούς  ούτως ώστε να είναι δυνατή η χρήση του φυσικού δροσισμού ακόμη και  κατά τις πρώτες πρωινές ώρες κατά τη θερινή περίοδο.");
INSERT INTO kataskeyi_teyxos VALUES("21","ilioprostasiaanoig","Ως μέσο ηλιοπροστασίας των ανοιγμάτων επιλέχθηκαν οι τέντες. Σε συνδυασμό με την κινητή ηλιοπροστασία, η οποία όμως δεν λαμβάνεται υπόψη κατά τους υπολογισμούς της ενεργειακής κατανάλωσης του κτιρίου, εκτιμάται ότι  προσφέρουν επαρκή προστασία.");
INSERT INTO kataskeyi_teyxos VALUES("22","fysikosfwtismos","Σε όλους τους κύριους χώρους των διαμερισμάτων θα τοποθετηθούν ανοίγματα τα οποία θα προσφέρουν επαρκή φυσικό φωτισμό.");
INSERT INTO kataskeyi_teyxos VALUES("23","fysikosdrosismos","Εκτιμάται ότι τα ανοίγματα τα οποία προβλέπονται, θα προσφέρουν επαρκή φυσικό δροσισμό.");
INSERT INTO kataskeyi_teyxos VALUES("24","pathitikailiakasyst","Το παθητικό σύστημα που επιλέχθηκε να ενσωματωθεί στο σχεδιασμό του κτιρίου είναι  αυτό του άμεσου  κέρδους.  Όπως φαίνεται και  στα σχέδια σκιασμού των ανοιγμάτων, κατά τη διάρκεια του χειμώνα  υπάρχει επαρκής ηλιασμός ενώ κατά την περίοδο του θέρους η άμεση ηλιακή ακτινοβολία μειώνεται στο ελάχιστο.  Η επαρκής  ποσότητα ανοιγμάτων στη νότια όψη συνδυάζεται με βαριά υλικά υψηλής θερμοχωρητικότητας και  με  ισχυρή θερμομόνωση, ούτως ώστε το κτίριο να μπορεί να λειτουργήσει ως συλλέκτης,  αποθήκη και παγίδα ηλιακής ενέργειας.");
INSERT INTO kataskeyi_teyxos VALUES("25","diamorfwsiperiv","Λόγω της θέσης του οικοπέδου, θα γίνει φύτευση χαμηλών δένδρων. Επί πλέον, θα επιλεγούν και χαμηλές πόες και χαμηλά φυτά με μικρές απαιτήσεις σε νερό, οι οποίες θα λειτουργήσουν  βελτιωτικά στο μικροκλίμα της περιοχής");
INSERT INTO kataskeyi_teyxos VALUES("26","kelyfos1","Η είσοδος των κατοικιών και τα κλιμακοστάσια θεωρούνται θερμαινόμενοι χώροι,  οπότε οφείλουν να είναι θερμομονωμένοι. Σε κάτοψη δίδεται σε τομή το ισόγειο ως ο θερμαινόμενος χώρος του κτιρίου.");
INSERT INTO kataskeyi_teyxos VALUES("27","kelyfos2","Ο φέρων οργανισμός του κτιρίου φέρει θερμομόνωση εξωτερικά, ενώ οι  τοιχοποιίες πλήρωσης έχουν  θερμομόνωση  στον  πυρήνα.  Το δάπεδο του ισογείου, θα  θερμομονωθεί στην κάτω παρειά του.Η συλλογή των γεωμετρικών δεδομένων και οι υπολογισμοί  των θερμικών χαρακτηριστικών των επιφανειών του κτιρίου γίνεται έχοντας  υπόψη τα εξής:");
INSERT INTO kataskeyi_teyxos VALUES("28","kelyfos3","1. για  τον υπολογισμό της ενεργειακής κατανάλωσης και   κατ’ επέκταση της ενεργειακής απόδοσης του κτιρίου είναι απαραίτητα όχι μόνο τα  θερμικά και γεωμετρικά χαρακτηριστικά των θερμαινόμενων χώρων, αλλά και αυτά των μη  θερμαινόμενων που είναι σε επαφή με τους θερμαινόμενους,");
INSERT INTO kataskeyi_teyxos VALUES("29","kelyfos4","2. τα δομικά στοιχεία του κτιρίου που γειτνιάζουν με αλλά  θερμαινόμενα κτίρια, κατά τον έλεγχο θερμικής επάρκειας του κτηρίου θεωρείται  ότι έρχονται σε επαφή με το εξωτερικό περιβάλλον (ως να μην υπάρχουν τα γειτονικά  κτήρια), ενώ  για  τον υπολογισμό  της  ενεργειακής απόδοσης  θεωρούνται αδιαβατικά,");
INSERT INTO kataskeyi_teyxos VALUES("30","kelyfos5","3.τα δομικά στοιχεία θερμικής ζώνης του κτιρίου που γειτνιάζουν  με άλλη θερμική ζώνη του ίδιου κτιρίου θεωρούνται αδιαβατικά,");
INSERT INTO kataskeyi_teyxos VALUES("31","kelyfos6","4.οι αδιαφανείς και οι διαφανείς επιφάνειες έχουν ηλιακά κέρδη τα οποία  εξαρτώνται από τον προσανατολισμό και τον σκιασμό τους,");
INSERT INTO kataskeyi_teyxos VALUES("32","kelyfos7","5.σύμφωνα με την Τ.Ο.Τ.Ε.Ε. 20701-1/2010 για λόγους απλοποίησης,  για τον υπολογισμό της ενεργειακής απόδοσης κτιρίων, για κατακόρυφα δομικά  αδιαφανή στοιχεία με συντελεστή θερμοπερατότητας  μικρότερο  από  0,60  W/(m2.K),  ο συντελεστής σκίασης δύναται ναθεωρηθεί ίσος με 0,9.");
INSERT INTO kataskeyi_teyxos VALUES("33","thermoeparkeia1","Για τα κουφώματα τού ισογείου επιλέχθηκε η χρήση πλαισίου αλουμινίου  χωρίς θερμοδιακοπή, με μέσο συντελεστή  θερμοπερατότητας  U = 2,8 W/(m2K)  όπως  προκύπτει  από  τον σχετικό αναλυτικό υπολογισμό  με μέσου πλάτους πλαισίου 12,5cm. Θα  φέρουν υαλοπίνακα με πάχη 4-12-4 χωρίς επίστρωση χαμηλής εκπομπής και αέρα στο διάκενο. Ο συντελεστής θερμοπερατότητας του  υαλοπίνακα που θα χρησιμοποιηθεί θα είναι μέσου Ug=2,80W/(m2K) όπως προκύπτει από τον σχετικό πίνακα υλικών της ΤΟΤΕΕ.  Ο υπολογισμός του U των κουφωμάτων έγινε βάσει της σχέσης 4.2 και της Τ.Ο.Τ.Ε.Ε. 20701-2/2010. Οι υπολογισμοί αυτοί δίνονται  αναλυτικά στο Τεύχος Υπολογισμών που συνοδεύει την παρούσα μελέτη. Στον σχετικό πίνακα  δίνονται αναλυτικά οι συντελεστές θερμοπερατότητας  των κουφωμάτων του ισογείου . Όπως φαίνεται στους πίνακες, οι τιμές θερμοπερατότητας των κουφωμάτων καλύπτουν  τις ελάχιστες απαιτήσεις.");
INSERT INTO kataskeyi_teyxos VALUES("34","kataskeyastikeslyseis1","Η τοποθέτηση των κουφωμάτων είναι κεντρική-ισομερής. Για την μείωση των απωλειών από τις θερμογέφυρες  που δημιουργούνται στους λαμπάδες, το ανωκάσι και το κατωκάσι, υπάρχει συνέχεια της θερμομόνωσης (πάχους 2cm) κάθετα στους  λαμπάδες, το ανωκάσι και το κατωκάσι των κουφωμάτων του ισογείου.");
INSERT INTO kataskeyi_teyxos VALUES("35","thermansisxediasmos","Η θέρμανση των εσωτερικών χώρων του κτιρίου, σύμφωνα με την μελέτη θέρμανσης (διαστασιολόγησης συστήματος),  θα γίνεται μέσω κεντρικής μονάδας θέρμανσης, με λέβητα-καυστήρα πετρελαίου,   με   μονοσωλήνιο   σύστημα   και   αυτονομία.  Το σύστημα θέρμανσης θα καλύπτει όλους  τους χώρους  στο ισόγειο. Οι αποθήκες  στο  υπόγειο του κτηρίου, είναι μη θερμαινόμενοι  χώροι.");
INSERT INTO kataskeyi_teyxos VALUES("36","psyksisxediasmos","Η ψύξη των χώρων του κτιρίου θα γίνεται με τοπικές αντλίες θερμότητας πού θα εγκατασταθούν  σε μεμονωμένους χώρους του ισογείου με δυνατότητα κάλυψης του 50% του μέγιστου απαιτούμενου ψυκτικού φορτίου  για το κτίριο.");
INSERT INTO kataskeyi_teyxos VALUES("37","elthermansi1","Σύμφωνα με την μελέτη θέρμανσης του κτιρίου, το μέγιστο απαιτούμενο θερμικό φορτίο για την θέρμανση του συγκεκριμένου  χώρου ανέρχεται στις ________________ kcal/h.");
INSERT INTO kataskeyi_teyxos VALUES("38","elthermansi2","Για τον υπολογισμό της ισχύος του λέβητα- καυστήρα λαμβάνεται συντελεστής προσαύξησης 30%, λόγω θερμικών απωλειών στο  λέβητα, στο δίκτυο διανομής, αλλά και για την επιτάχυνση της έναρξης λειτουργίας");
INSERT INTO kataskeyi_teyxos VALUES("39","elthermansi3","Η θερμική ισχύς της μονάδας λέβητα-καυστήρα θα είναι ________________ kcal/h ή ___________________ kW και  θα λειτουργεί με πετρέλαιο.");
INSERT INTO kataskeyi_teyxos VALUES("40","elthermansi4","Σύμφωνα με τον Κ.Εν.Α.Κ. για την κατηγορία ενεργειακής απόδοσης των λεβήτων του κτηρίου αναφοράς,  το Π.Δ. 335/1993 και την τροποποίηση αυτού με το ΠΔ 32/2010, η μονάδα θα έχει βαθμό θερμικής απόδοσης  92,0% και ο καυστήρας θα  είναι μονοβάθμιος δικαιολογούμενος από την μικρή ισχύ του συστήματος.");
INSERT INTO kataskeyi_teyxos VALUES("41","elthermansi5","Η θερμοκρασία λειτουργίας της εγκατάστασης θέρμανσης θα είναι 85οC για την προσαγωγή και 70oC για την επιστροφή. Η διανομή στα διαμερίσματα θα γίνεται με μονοσωλήνιο σύστημα, με ένα ζεύγος κεντρικών κατακόρυφων στηλών  προσαγωγής-επιστροφής θερμού νερού. Οι κατακόρυφες σωλήνες προσαγωγής θα τροφοδοτούνται μέσω ενός κοινού κεντρικού συλλέκτη (κολλεκτέρ),  όπως και οι κατακόρυφες σωλήνες επιστροφής θερμού νερού. Για κάθε τελικό χρήστη, διαμέρισμα ή κατάστημα, θα υπάρχουν δύο ξεχωριστοί  συλλέκτες (κολλεκτέρ) διανομής (προσαγωγή και επιστροφή), από τους οποίους θα αναχωρούν και στους οποίους θα επιστρέφουν όλα τα  οριζόντια κυκλώματα θερμού νερού προς και από τα θερμαντικά σώματα των επιμέρους χώρων κάθε ιδιοκτησίας. Σε κάθε ζεύγος  συλλεκτών (κολλεκτέρ) διανομής ιδιοκτησίας, τοποθετείται (σε κοινόχρηστο χώρο) σύστημα θερμιδομέτρησης.");
INSERT INTO kataskeyi_teyxos VALUES("42","elthermansi6","Όλες οι σωληνώσεις του δικτύου διανομής που διέρχονται από μη θερμαινόμενους χώρους θα είναι μονωμένες  και σύμφωνα με τις ελάχιστες προδιαγραφές που ορίζει ο Κ.Εν.Α.Κ. και η Τ.Ο.Τ.Ε.Ε. 20701-1/2010 (πίνακας 4.7).  Για τις κατακόρυφες στήλες Φ35, το πάχος της μόνωσης σύμφωνα με τους κανονισμούς πρέπει να είναι 13mm, ενώ  για τους βρόχους οριζόντιας τοπικής διανομής Φ16, το πάχος της μόνωσης πρέπει να είναι 9mm. Οι σωληνώσεις διανομής,  από τους τοπικούς συλλέκτες μέχρι τις τερματικές μονάδες (εκπομπής θερμότητας) των διαμερισμάτων ή των καταστημάτων,  διέρχονται σχεδόν εξ’ ολοκλήρου από εσωτερικούς θερμαινόμενους χώρους, όπου δεν απαιτείται θερμομόνωση των σωληνώσεων.  Οι κατακόρυφες κεντρικές στήλες του δικτύου διανομής θα θερμομονωθούν στο σύνολό τους.");
INSERT INTO kataskeyi_teyxos VALUES("43","elthermansi7","Λόγω του ότι υπάρχει μία ιδιοκτησία (διαμέρισμα) στο κτίριο, βάσει του Κ.Εν.Α.Κ., δεν απαιτείται η  κατανομή δαπανών ανά χώρο (ιδιοκτησία) και για το λόγο αυτό η εφαρμοζόμενη θέρμανση σύμφωνα με τα προαναφερόμενα, δεν  θεωρείται αυτόνομη με την καθαρή έννοια της αυτονομίας. Η εγκατάσταση θέρμανσης θα διαθέτει σύστημα αντιστάθμισης,  για την κάλυψη των μερικών  φορτίων  θέρμανσης,  με  την  χρήση  τετράοδης  βάνας  αυτόματης  ρύθμισης  κυκλοφορίας  νερού. Ο κυκλοφορητής της διανομής θερμού νερού θέρμανσης θα έχει ονομαστική ηλεκτρική ισχύ 0,3 kW και θα  είναι σταθερού αριθμού στροφών και παροχής για σταθερό μανομετρικό.");
INSERT INTO kataskeyi_teyxos VALUES("44","elpsyksi1","Δεν απαιτείται μελέτη ψύξης-κλιματισμού λόγω του μικρού όγκου του κτιρίου.");
INSERT INTO kataskeyi_teyxos VALUES("45","elpsyksi2","Η συνολική ψυκτική ικανότητα (ισχύς) των αντλιών θερμότητας για τη χρήση αυτή εκτιμάται σε _____________ Btu/h (_______________ kW) με δυνατότητα κάλυψης 50% ψυκτικού φορτίου σε συνθήκες σχεδιασμού.");
INSERT INTO kataskeyi_teyxos VALUES("46","elpsyksi3","Οι προδιαγραφές του συστήματος ψύξης είναι αυτές πού αναφέρονται στο κτίριο αναφοράς.Έτσι, θα εγκατασταθούν τοπικές αντλίες θερμότητας διαιρούμενου τύπου και, ενδεικτικά, μία στο καθιστικό και μία στους διαδρόμους πριν τα υπνοδωμάτια για ήπια ψύξη των υπνοδωματίων. Οι μονάδες θα έχουν βαθμό ενεργειακής απόδοσης EER=3,0. Στη συγκεκριμένη χρήση του κτιρίου,  η χρήση  μονάδων ψύξης, παρατηρείται κυρίως τις μεσημεριανές ώρες, κατά τις ημέρες με θερμοκρασίες πάνω από 30οC.");
INSERT INTO kataskeyi_teyxos VALUES("47","elznx1","Σύμφωνα με τη μελέτη διαστασιολόγησης του συστήματος ΖΝΧ, για την κάλυψη των aναγκών για ζεστό νερό χρήσης, θα εγκατασταθούν ένας κεντρικός θερμαντήρας (δεξαμενή αποθήκευσης) τριπλής ενέργειας, που θα λαμβάνει θερμική ενέργεια από την μονάδα λέβητα-καυστήρα πετρελαίου μέσω ανεξάρτητου δικτύου ελεγχόμενου από θερμοστάτη και ηλεκτροβάννα και από συστοιχία ηλιακών συλλεκτών στο δώμα, όπως περιγράφεται στην επόμενη παράγραφο. Ο θερμαντήρας θα έχει και εφεδρική ηλεκτρική αντίσταση.");
INSERT INTO kataskeyi_teyxos VALUES("48","elznx2","Η λειτουργία θα ελέγχεται από διαφορικούς θερμοστάτες ηλιακών-Δ/Ξ αποθήκευσης, αλλά και χρονοδιακόπτη-ηλεκτροβάννα (παροχής θερμικής ενέργειας από το λέβητα). Σε περίπτωση δυνατότητας πλήρης κάλυψης των φορτίων ΖΝΧ από την διαθέσιμη ηλιακή ενέργεια,θα πρέπει η παροχή θερμικής ενέργειας από τον λέβητα να διακόπτεται.");
INSERT INTO kataskeyi_teyxos VALUES("49","elznx3","Ο λέβητας-καυστήρας που επιλέχθηκε είναι αυτός με τον λέβητα θέρμανσης, λόγω της μικρής ισχύος του προκύπτοντα για τα ΖΝΧ, θα είναι δηλαδή μίας βαθμίδας, πετρελαίου και θα έχει βαθμό θερμικής απόδοσης 93,2%, περίπου ίδιο με την απόδοση του κτιρίου αναφοράς όπως ορίζεται στον πίνακα 4.1 της Τ.Ο.Τ.Ε.Ε. 20701-1/2010.");
INSERT INTO kataskeyi_teyxos VALUES("50","elznx4","Οι σωληνώσεις του δικτύου διανομής ΖΝΧ θα είναι θερμομονωμένες σύμφωνα με τις απαιτήσεις του άρθρου 8 του Κ.ΕΝ.Α.Κ. και τα οριζόμενα στην σχετική Τ.Ο.Τ.Ε.Ε. 20701-1/2010 (πίνακας 4.7). Το δίκτυο διανομής ΖΝΧ θα διέρχεται μέσα από τους εσωτερικούς χώρους του κτιρίου και το πάχος θερμομόνωσης των σωληνώσεων θα είναι ίσο με το ελάχιστο πάχος 9mm σύμφωνα με τους κανονισμούς. Συγκεκριμένα, επιλέχθηκε εύκαμπτη ελαστομερής θερμομόνωση κογχυλίων 9mm.");
INSERT INTO kataskeyi_teyxos VALUES("51","egiliaka1","Επιλέγεται οι ηλιακοί συλλέκτες να τοποθετηθούν στο δώμα του κτιρίου και προς την Νότια πλευρά αυτού, εξασφαλίζοντας μηδενική στην ουσία σκίαση και επαρκή κλίση. Ο Θερμαντήρας, τοποθετείται πάνω από τους συλλέκτες, στο δώμα του κτιρίου.Τα παραπάνω φαίνονται σε σκίτσο, πού επισυνάπτεται.");
INSERT INTO kataskeyi_teyxos VALUES("52","egiliaka2","Για τον υπολογισμό του φορτίου κάλυψης των ηλιακών συλλεκτών στην παρούσα μελέτη, εφαρμόστηκε η μέθοδος υπολογισμού του μέσου μηνιαίου θερμικού οφέλους, με βάση την προσπίπτουσα ηλιακή ακτινοβολία, τον προσανατολισμό των ηλιακών συλλεκτών προς τον Νότο και την κλίση αυτών ως προς τον ορίζοντα σε ______ μοίρες.");
INSERT INTO kataskeyi_teyxos VALUES("53","egiliaka3","Οι τιμές της μέσης μηνιαίας προσπίπτουσας ηλιακής ακτινοβολίας, του μέσου συντελεστή απολαβής θερμότητας και της μέσης μηνιαίας θερμοκρασίας ημέρας, ανακτήθηκαν από τους σχετικούς πίνακες της ΤΟΤΕΕ. . Η μέθοδος αυτή, δίνει περίπου τα ίδια αποτελέσματα για την \n\nκάλυψη του φορτίου ζεστού νερού χρήσης, με την αναλυτική μέθοδο υπολογισμού όπως δίνεται από το ευρωπαϊκό πρότυπο ΕΛΟΤ ΕΝ ISO 12976.2:2006, και για τις ανάγκες της παρούσας μελέτης είναι επαρκής.");
INSERT INTO kataskeyi_teyxos VALUES("54","egiliaka4","Σύμφωνα με τη μελέτη διαστασιολόγησης των ηλιακών συλλεκτών, για το συγκεκριμένο κτίριο, μελετήθηκε η εφαρμογή επίπεδων ηλιακών συλλεκτών στην κεραμοσκεπή του κτιρίου, προκειμένου για την κάλυψη τουλάχιστον του 60% του απαιτούμενου φορτίου για ζεστό νερό χρήσης.");
INSERT INTO kataskeyi_teyxos VALUES("55","egiliaka5","Η βέλτιστη γωνία κλίσης ηλιακών συλλεκτών, εξαρτάται από το γεωγραφικό πλάτος της περιοχής και τον προσανατολισμό τοποθέτησης τους. Σύμφωνα με τον εμπειρικό κανόνα, για τις ελληνικές περιοχές, η βέλτιστη κλίση ενός ηλιακού συλλέκτη για ετήσια χρήση είναι περίπου ίση με το γεωγραφικό πλάτος της περιοχής, όπου για την ___Αργολίδα___ είναι ______ο. Στο υπό μελέτη κτίριο ο προσανατολισμός των ηλιακών συλλεκτών θα είναι νότιος και η γωνία εγκατάστασης τους θα είναι ____ο.");
INSERT INTO kataskeyi_teyxos VALUES("56","egiliaka6","Χρησιμοποιείται απλός ηλιακός συλλέκτης, και από τον πίνακα 5.8 της ΤΟΤΕΕ 1/2010, σελ. 133, λαμβάνεται συντελεστής αξιοποίησης ηλιακής ακτινοβολίας για χρήση σε κατοικίες, αυτός των 33%. Επίσης, ως ποσοστό απωλειών , για σύστημα χωρίς ανακυκλοφορία και με μόνωση του κτιρίου αναφοράς, για ημερήσια ζήτηση 200-1000 lt, λαμβάνουμε αυτό του 7,7%.");
INSERT INTO kataskeyi_teyxos VALUES("57","egiliaka7","Εγκατάσταση μεγαλύτερης επιφάνειας ηλιακών συλλεκτών, θα δημιουργούσε προβλήματα τοποθέτησής τους στην κεκλιμένη στέγη.Και η περίπτωση αυτή ωστόσο δεν κρίνεται ιδιαίτερα σκόπιμη τεχνικοοικονομικά, δεδομένου πως και με τον παρόντα σχεδιασμό επιτυγχάνεται μέση ετήσια κάλυψη φορτίου τουλάχιστον 65%, δηλαδή υπερ-ικανοποιητική, χωρίς η εγκατάσταση να βασίζεται σε εξεζητημένες και συνεπώς ακριβές λύσεις.");
INSERT INTO kataskeyi_teyxos VALUES("58","egfwtismos1","Η κατανάλωση ενέργειας για φωτισμό για την επιλεγμένη χρήση δεν λαμβάνεται υπ’ όψη για την ενεργειακή απόδοση του κτιρίου. Έτσι, η κατανάλωση ενέργειας για φωτισμό δεν απαιτεί υπολογισμό, και δεν υποβάλλεται σχετικό έντυπο μελέτης. Στις ζώνες φυσικού φωτισμού σύμφωνα με τον Κ.Εν.Α.Κ., θα πρέπει να εξασφαλίζεται η δυνατότητα αφής/σβέσης τουλάχιστον του 50% των λαμπτήρων που βρίσκονται σε αυτές.");
INSERT INTO kataskeyi_teyxos VALUES("59","egfwtismos2","Για την αξιοποίηση του φυσικού φωτισμού κατά την διάρκεια της ημέρας, προβλέπεται η εγκατάσταση απλών συστημάτων \n\nελέγχου των φωτιστικών στις ζώνες φυσικού φωτισμού που αποτελούνται από αισθητήρα φυσικού φωτισμού και αυτόματους διακόπτες σβέσης στο 50% των φωτιστικών όλων των ζωνών.");
INSERT INTO kataskeyi_teyxos VALUES("60","egfwtismos3","Στο κτίριο δεν εφαρμόζεται διόρθωση (συνφ) σε καμία περίπτωση, λόγω χαμηλής εγκατεστημένης ηλεκτρικής ισχύος.");
INSERT INTO kataskeyi_teyxos VALUES("61","enalaktiki1","1. Η εγκατάσταση συστήματος συμπαραγωγής ηλεκτρισμού και θερμότητας, η οποία κρίνεται ως μη οικονομικά βιώσιμη εφαρμογή για το υπό μελέτη κτήριο. Τα χαμηλά θερμικά φορτία της χειμερινής περιόδου περιορίζονται στο ελάχιστο την θερινή περίοδο, οπότε το σύστημα συμπαραγωγής δεν λειτουργεί οικονομικά.");
INSERT INTO kataskeyi_teyxos VALUES("62","enalaktiki2","2. Η περίπτωση εγκατάστασης οριζόντιων γεωθερμικών εναλλακτών για την λειτουργία αντλίας θερμότητας δεν μπορεί να εφαρμοστεί, για οικονομικούς λόγους επίσης, λόγω του μικρού φορτίου πού απαιτείται.");
INSERT INTO kataskeyi_teyxos VALUES("63","enalaktiki3","3. Η εγκατάσταση ηλιακών συλλεκτών όπως παρουσιάστηκε παραπάνω και η οποία είναι υποχρεωτική βάσει των κανονισμών, θα καλύψει περίπου το 70% του θερμικού φορτίου για ζεστό νερό  χρήσης  όλου  του κτηρίου. Λόγω της περιορισμένης επιφάνειας της στέγης, δεν υπάρχει δυνατότητα εφαρμογής περαιτέρω εγκατάστασης ηλιακών συλλεκτών ή φωτοβολταϊκών στοιχείων.");
INSERT INTO kataskeyi_teyxos VALUES("64","kelyfos3331","Τα δομικά στοιχεία του κτηρίου θα επιχριστούν με ανοιχτόχρωμο επίχρισμα.  Οι συντελεστές απορροφητικότητας και οι συντελεστές εκπομπής των δομικών στοιχείων λαμβάνονται από τον πίνακα 3.14 της Τ.Ο.Τ.Ε.Ε. 20701-1/2010. Στον σχετικό πίνακα πού επισυνάπτεται δίνονται \n\nσυγκεντρωτικά τα απαιτούμενα για τους υπολογισμούς δεδομένα.");
INSERT INTO kataskeyi_teyxos VALUES("65","kelyfos3332","Υπάρχει δομικό στοιχείο σε επαφή με το έδαφος που είναι το δάπεδο του ισογείου.");
INSERT INTO kataskeyi_teyxos VALUES("66","kelyfos3333","Δεν υπάρχουν δομικά στοιχεία σε επαφή με μη θερμαινόμενους χώρους.");
INSERT INTO kataskeyi_teyxos VALUES("67","kelyfos3334","Όπως αναφέρθηκε σε προηγούμενη παράγραφο, για τα κουφώματα  επιλέχθηκε η χρήση πλαισίου  αλουμινίου χωρίς θερμοδιακοπή  \n\nπου  θα  φέρει  υαλοπίνακα  4-12-4  χωρίς επίστρωση χαμηλής εκπομπής (στη θέση 2) και αέρα στο διάκενο. Ο συντελεστής ηλιακού κέρδους σε κάθετη πρόσπτωση των υαλοπινάκων δηλώνεται από το κατασκευαστή τους ίσος με g=0,52. Αναλυτικά οι υπολογισμοί σχετικά με τα διαφανή \n\nδομικά στοιχεία δίνονται στο Τεύχος Υπολογισμών που συνοδεύει τη παρούσα μελέτη.");
INSERT INTO kataskeyi_teyxos VALUES("68","kelyfos3335","Για  κάθε  κούφωμα  υπολογίσθηκε  ο  συντελεστής  σκίασης  από  ορίζοντα  Fhor,  ο  συντελεστής σκίασης από προστέγασμα Fov και ο συντελεστής σκίασης από πλευρικό Ffin. Στα σχέδια   δίνονται οι γωνίες σκίασης των κουφωμάτων από μακρινά εμπόδια  (περιβάλλον κτηρίου), \n\nπροστεγάσματα και πλευρικά σκίαστρα.");



DROP TABLE kataskeyi_therm_alles;

CREATE TABLE `kataskeyi_therm_alles` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `thermo_u` varchar(256) DEFAULT NULL,
  `plithos` int(2) DEFAULT NULL,
  `ypsos` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_therm_eks;

CREATE TABLE `kataskeyi_therm_eks` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `thermo_u` varchar(10) DEFAULT NULL,
  `plithos` int(2) DEFAULT NULL,
  `ypsos` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_therm_es;

CREATE TABLE `kataskeyi_therm_es` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `thermo_u` varchar(10) DEFAULT NULL,
  `plithos` int(2) DEFAULT NULL,
  `ypsos` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;




DROP TABLE 
kataskeyi_t_a;

CREATE TABLE `kataskeyi_t_a` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `t_mikos` decimal(7,5) DEFAULT NULL,
  `t_ypsos` decimal(7,5) DEFAULT NULL,
  `t_platos` decimal(7,5) DEFAULT NULL,
  `t_u` decimal(7,5) DEFAULT NULL,
  `t_thermo` decimal(7,5) DEFAULT NULL,
  `t_thermodap` decimal(7,5) NOT NULL,
  `d_ypsos` decimal(7,5) DEFAULT NULL,
  `d_u` decimal(7,5) DEFAULT NULL,
  `d_thermo` decimal(7,5) DEFAULT NULL,
  `yp_mikos` decimal(7,5) DEFAULT NULL,
  `yp_plithos` int(1) DEFAULT NULL,
  `yp_u` decimal(7,5) DEFAULT NULL,
  `yp_thermo` decimal(7,5) DEFAULT NULL,
  `syr_mikos` decimal(7,5) DEFAULT NULL,
  `syr_ypsos` decimal(7,5) DEFAULT NULL,
  `syr_u` decimal(7,5) DEFAULT NULL,
  `yp_len` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO 
kataskeyi_t_a VALUES("1","1","ΙΣ-Α1","5.90000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.53000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," 0");
INSERT INTO 
kataskeyi_t_a VALUES("2","1","ΙΣ-Α2","5.00000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","1.25000","3","0.37900","0.05000","0.00000","0.00000","0.00000","  0||");
INSERT INTO 
kataskeyi_t_a VALUES("3","1","ΙΣ-Α3","2.25000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","1.03000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," 0");
INSERT INTO 
kataskeyi_t_a VALUES("4","1","ΙΣ-Α4","0.85000","3.75000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.78000","1","0.37900","0.05000","0.00000","0.00000","0.00000","Array");
INSERT INTO 
kataskeyi_t_a VALUES("5","1","ΙΣ-Α5","4.20000","3.75000","0.55000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","1.33000","2","0.37900","0.05000","0.00000","0.00000","0.00000","Array");
INSERT INTO 
kataskeyi_t_a VALUES("6","1","ΙΣ-Α6","1.65000","3.15000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","1.03000","1","0.37900","0.05000","0.00000","0.00000","0.00000","Array");



DROP TABLE kataskeyi_t_b;

CREATE TABLE `kataskeyi_t_b` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `t_mikos` decimal(7,5) DEFAULT NULL,
  `t_ypsos` decimal(7,5) DEFAULT NULL,
  `t_platos` decimal(7,5) DEFAULT NULL,
  `t_u` decimal(7,5) DEFAULT NULL,
  `t_thermo` decimal(7,5) DEFAULT NULL,
  `t_thermodap` decimal(7,5) NOT NULL,
  `d_ypsos` decimal(7,5) DEFAULT NULL,
  `d_u` decimal(7,5) DEFAULT NULL,
  `d_thermo` decimal(7,5) DEFAULT NULL,
  `yp_mikos` decimal(7,5) DEFAULT NULL,
  `yp_plithos` int(1) DEFAULT NULL,
  `yp_u` decimal(7,5) DEFAULT NULL,
  `yp_thermo` decimal(7,5) DEFAULT NULL,
  `syr_mikos` decimal(7,5) DEFAULT NULL,
  `syr_ypsos` decimal(7,5) DEFAULT NULL,
  `syr_u` decimal(7,5) DEFAULT NULL,
  `yp_len` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_t_b VALUES("1","1","ΙΣ-Β1","5.70000","3.75000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.28000","1","0.37900","0.05000","0.00000","0.00000","0.00000","  0");
INSERT INTO kataskeyi_t_b VALUES("2","1","ΙΣ-Β2","2.30000","3.75000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.00000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," 0");
INSERT INTO kataskeyi_t_b VALUES("3","1","ΙΣ-B3","10.00000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","1.84000","2","0.37900","0.05000","0.00000","0.00000","0.00000"," 0|");
INSERT INTO kataskeyi_t_b VALUES("6","1","Υ-Β3","10.04000","3.40000","0.40000","0.27400","0.25000","0.55000","0.10000","0.37900","0.05000","2.36000","1","0.37900","0.05000","0.00000","0.00000","0.00000","  0");



DROP TABLE kataskeyi_t_d;

CREATE TABLE `kataskeyi_t_d` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `t_mikos` decimal(7,5) DEFAULT NULL,
  `t_ypsos` decimal(7,5) DEFAULT NULL,
  `t_platos` decimal(7,5) DEFAULT NULL,
  `t_u` decimal(7,5) DEFAULT NULL,
  `t_thermo` decimal(7,5) DEFAULT NULL,
  `t_thermodap` decimal(7,5) NOT NULL,
  `d_ypsos` decimal(7,5) DEFAULT NULL,
  `d_u` decimal(7,5) DEFAULT NULL,
  `d_thermo` decimal(7,5) DEFAULT NULL,
  `yp_mikos` decimal(7,5) DEFAULT NULL,
  `yp_plithos` int(1) DEFAULT NULL,
  `yp_u` decimal(7,5) DEFAULT NULL,
  `yp_thermo` decimal(7,5) DEFAULT NULL,
  `syr_mikos` decimal(7,5) DEFAULT NULL,
  `syr_ypsos` decimal(7,5) DEFAULT NULL,
  `syr_u` decimal(7,5) DEFAULT NULL,
  `yp_len` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_t_d VALUES("1","1","ΙΣ-Δ1","1.10000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","1.10000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," ");
INSERT INTO kataskeyi_t_d VALUES("2","1","ΙΣ-Δ2","4.20000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.63000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," ");
INSERT INTO kataskeyi_t_d VALUES("3","1","ΙΣ-Δ3","2.20000","3.15000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.98000","1","0.37900","0.05000","0.00000","0.00000","0.00000","  0");
INSERT INTO kataskeyi_t_d VALUES("4","1","ΙΣ-Δ4","3.85000","3.75000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","1.50000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," 0");
INSERT INTO kataskeyi_t_d VALUES("5","1","ΙΣ-Δ5","2.85000","3.75000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.00000","1","0.37900","0.05000","0.00000","0.00000","0.00000","  0");
INSERT INTO kataskeyi_t_d VALUES("6","1","ΙΣ-Δ6","3.85000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.25000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," 0");
INSERT INTO kataskeyi_t_d VALUES("7","1","ΙΣ-Δ7","2.00000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.58000","1","0.37900","0.05000","0.00000","0.00000","0.00000","");



DROP TABLE kataskeyi_t_n;

CREATE TABLE `kataskeyi_t_n` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `t_mikos` decimal(7,5) DEFAULT NULL,
  `t_ypsos` decimal(7,5) DEFAULT NULL,
  `t_platos` decimal(7,5) DEFAULT NULL,
  `t_u` decimal(7,5) DEFAULT NULL,
  `t_thermo` decimal(7,5) DEFAULT NULL,
  `t_thermodap` decimal(7,5) NOT NULL,
  `d_ypsos` decimal(7,5) DEFAULT NULL,
  `d_u` decimal(7,5) DEFAULT NULL,
  `d_thermo` decimal(7,5) DEFAULT NULL,
  `yp_mikos` decimal(7,5) DEFAULT NULL,
  `yp_plithos` int(1) DEFAULT NULL,
  `yp_u` decimal(7,5) DEFAULT NULL,
  `yp_thermo` decimal(7,5) DEFAULT NULL,
  `syr_mikos` decimal(7,5) DEFAULT NULL,
  `syr_ypsos` decimal(7,5) DEFAULT NULL,
  `syr_u` decimal(7,5) DEFAULT NULL,
  `yp_len` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_t_n VALUES("1","1","ΙΣ-Ν1","4.40000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","1.25000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," 0");
INSERT INTO kataskeyi_t_n VALUES("2","1","ΙΣ-Ν2","0.50000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.25000","1","0.37900","0.05000","0.00000","0.00000","0.00000","Array");
INSERT INTO kataskeyi_t_n VALUES("3","1","ΙΣ-Ν3","1.70000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","1.25000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," 0");
INSERT INTO kataskeyi_t_n VALUES("4","1","ΙΣ-Ν4","2.86000","4.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.25000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," 0");
INSERT INTO kataskeyi_t_n VALUES("5","1","ΙΣ-Ν5","2.85000","3.75000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.25000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," 0");
INSERT INTO kataskeyi_t_n VALUES("6","1","ΙΣ-Ν6","5.70000","3.15000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","1.25000","1","0.37900","0.05000","0.00000","0.00000","0.00000","  0");
INSERT INTO kataskeyi_t_n VALUES("8","2","Υ-Ν1","4.70000","3.40000","0.35000","0.27400","0.00000","0.00000","0.10000","0.37900","0.05000","0.96000","1","0.37900","0.05000","0.00000","0.00000","0.00000","  0");
INSERT INTO kataskeyi_t_n VALUES("9","1","ΟΡ-Ν6","5.70000","0.60000","0.45000","0.27400","0.25000","0.00000","0.10000","0.37900","0.05000","1.25000","1","0.37900","0.05000","0.00000","0.00000","0.00000"," 0");



DROP TABLE 
kataskeyi_xsystems_coldb;

CREATE TABLE `kataskeyi_xsystems_coldb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `isxys` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO 
kataskeyi_xsystems_coldb VALUES("1","1","0","1","0.00");



DROP TABLE kataskeyi_xsystems_coldd;

CREATE TABLE `kataskeyi_xsystems_coldd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `isxys` decimal(4,2) NOT NULL,
  `xwros` int(11) NOT NULL,
  `bathm` decimal(3,2) NOT NULL,
  `monwsi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_xsystems_coldd VALUES("1","1","0","0.00","0","1.00","0");
INSERT INTO kataskeyi_xsystems_coldd VALUES("2","1","1","0.00","0","0.00","0");



DROP TABLE kataskeyi_xsystems_coldp;

CREATE TABLE `kataskeyi_xsystems_coldp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `pigienergy` int(11) NOT NULL,
  `isxys` decimal(4,2) NOT NULL,
  `bathm` decimal(3,2) NOT NULL,
  `eer` decimal(3,2) NOT NULL,
  `jan` decimal(3,2) NOT NULL,
  `feb` decimal(3,2) NOT NULL,
  `mar` decimal(3,2) NOT NULL,
  `apr` decimal(3,2) NOT NULL,
  `may` decimal(3,2) NOT NULL,
  `jun` decimal(3,2) NOT NULL,
  `jul` decimal(3,2) NOT NULL,
  `aug` decimal(3,2) NOT NULL,
  `sep` decimal(3,2) NOT NULL,
  `okt` decimal(3,2) NOT NULL,
  `nov` decimal(3,2) NOT NULL,
  `decem` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_xsystems_coldp VALUES("1","1","3","2","35.00","1.00","3.20","0.00","0.00","0.00","0.00","0.50","0.50","0.50","0.50","0.50","0.00","0.00","0.00");



DROP TABLE kataskeyi_xsystems_coldt;

CREATE TABLE `kataskeyi_xsystems_coldt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `bathm` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_xsystems_coldt VALUES("1","1","τοπικές αντλίες θερμότητας","1.00");



DROP TABLE 
kataskeyi_xsystems_kkm;

CREATE TABLE `kataskeyi_xsystems_kkm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `tm_ther` int(11) NOT NULL,
  `F_h` decimal(5,2) NOT NULL,
  `R_h` decimal(5,2) NOT NULL,
  `Q_r_h` decimal(5,2) NOT NULL,
  `tm_psyx` int(11) NOT NULL,
  `F_c` decimal(5,2) NOT NULL,
  `R_c` decimal(5,2) NOT NULL,
  `Q_r_c` decimal(5,2) NOT NULL,
  `tm_ygr` int(11) NOT NULL,
  `H_r` decimal(5,2) NOT NULL,
  `filters` int(11) NOT NULL,
  `E_vent` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_xsystems_light;

CREATE TABLE `kataskeyi_xsystems_light` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `isxys` decimal(6,2) NOT NULL,
  `perioxi` decimal(6,2) NOT NULL,
  `ayt_elegxoy` int(11) NOT NULL,
  `ayt_kinisis` int(11) NOT NULL,
  `thermotita` int(11) NOT NULL,
  `asfaleia` int(11) NOT NULL,
  `efedreia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE 
kataskeyi_xsystems_thermb;

CREATE TABLE `kataskeyi_xsystems_thermb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `isxys` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO 
kataskeyi_xsystems_thermb VALUES("1","1","0","1","0.00");



DROP TABLE kataskeyi_xsystems_thermd;

CREATE TABLE `kataskeyi_xsystems_thermd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `isxys` decimal(4,2) NOT NULL,
  `xwros` int(11) NOT NULL,
  `bathm` decimal(3,2) NOT NULL,
  `monwsi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_xsystems_thermd VALUES("1","1","0","0.00","0","1.00","0");
INSERT INTO kataskeyi_xsystems_thermd VALUES("2","1","1","0.00","0","0.00","0");



DROP TABLE kataskeyi_xsystems_thermp;

CREATE TABLE `kataskeyi_xsystems_thermp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `pigienergy` int(11) NOT NULL,
  `isxys` decimal(4,2) NOT NULL,
  `bathm` decimal(3,2) NOT NULL,
  `cop` decimal(3,2) NOT NULL,
  `jan` decimal(3,2) NOT NULL,
  `feb` decimal(3,2) NOT NULL,
  `mar` decimal(3,2) NOT NULL,
  `apr` decimal(3,2) NOT NULL,
  `may` decimal(3,2) NOT NULL,
  `jun` decimal(3,2) NOT NULL,
  `jul` decimal(3,2) NOT NULL,
  `aug` decimal(3,2) NOT NULL,
  `sep` decimal(3,2) NOT NULL,
  `okt` decimal(3,2) NOT NULL,
  `nov` decimal(3,2) NOT NULL,
  `decem` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_xsystems_thermp VALUES("5","1","0","3","0.00","1.00","1.00","1.00","1.00","1.00","1.00","0.00","0.00","0.00","0.00","0.00","0.00","1.00","1.00");



DROP TABLE kataskeyi_xsystems_thermt;

CREATE TABLE `kataskeyi_xsystems_thermt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `bathm` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_xsystems_thermt VALUES("1","1","σωματα καλοριφερ","1.00");



DROP TABLE 
kataskeyi_xsystems_ygrd;

CREATE TABLE `kataskeyi_xsystems_ygrd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `xwros` int(11) NOT NULL,
  `bathm` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_xsystems_ygrp;

CREATE TABLE `kataskeyi_xsystems_ygrp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `pigienergy` int(11) NOT NULL,
  `isxys` decimal(5,2) NOT NULL,
  `bathm` decimal(5,2) NOT NULL,
  `jan` decimal(5,2) NOT NULL,
  `feb` decimal(5,2) NOT NULL,
  `mar` decimal(5,2) NOT NULL,
  `apr` decimal(5,2) NOT NULL,
  `may` decimal(5,2) NOT NULL,
  `jun` decimal(5,2) NOT NULL,
  `jul` decimal(5,2) NOT NULL,
  `aug` decimal(5,2) NOT NULL,
  `sep` decimal(5,2) NOT NULL,
  `okt` decimal(5,2) NOT NULL,
  `nov` decimal(5,2) NOT NULL,
  `decem` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_xsystems_ygrt;

CREATE TABLE `kataskeyi_xsystems_ygrt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `bathm` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE 
kataskeyi_xsystems_znxa;

CREATE TABLE `kataskeyi_xsystems_znxa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `bathm` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO 
kataskeyi_xsystems_znxa VALUES("1","1","θερμαντήρες σε εσ.χωρ.","1.00");



DROP TABLE kataskeyi_xsystems_znxb;

CREATE TABLE `kataskeyi_xsystems_znxb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `isxys` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_xsystems_znxb VALUES("1","1","2","1","0.00");



DROP TABLE kataskeyi_xsystems_znxd;

CREATE TABLE `kataskeyi_xsystems_znxd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `anakykloforia` int(11) NOT NULL,
  `xwros` int(11) NOT NULL,
  `bathm` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_xsystems_znxd VALUES("1","1","Δίκτυο διανομής ΖΝΧ","0","0","0.84");



DROP TABLE kataskeyi_xsystems_znxiliakos;

CREATE TABLE `kataskeyi_xsystems_znxiliakos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `thermansi` int(11) NOT NULL,
  `znx` int(11) NOT NULL,
  `syna` decimal(4,3) NOT NULL,
  `synb` decimal(4,3) NOT NULL,
  `epifaneia` decimal(3,2) NOT NULL,
  `gdeg` decimal(5,2) NOT NULL,
  `bdeg` decimal(5,2) NOT NULL,
  `fs` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_xsystems_znxiliakos VALUES("2","1","1","0","1","0.000","0.000","0.00","180.00","30.00","1.00");



DROP TABLE kataskeyi_xsystems_znxp;

CREATE TABLE `kataskeyi_xsystems_znxp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `pigienergy` int(11) NOT NULL,
  `isxys` decimal(4,2) NOT NULL,
  `bathm` decimal(3,2) NOT NULL,
  `jan` decimal(3,2) NOT NULL,
  `feb` decimal(3,2) NOT NULL,
  `mar` decimal(3,2) NOT NULL,
  `apr` decimal(3,2) NOT NULL,
  `may` decimal(3,2) NOT NULL,
  `jun` decimal(3,2) NOT NULL,
  `jul` decimal(3,2) NOT NULL,
  `aug` decimal(3,2) NOT NULL,
  `sep` decimal(3,2) NOT NULL,
  `okt` decimal(3,2) NOT NULL,
  `nov` decimal(3,2) NOT NULL,
  `decem` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO kataskeyi_xsystems_znxp VALUES("2","1","0","3","1.00","1.00","1.00","1.00","1.00","1.00","1.00","1.00","1.00","1.00","1.00","1.00","1.00","1.00");



DROP TABLE 
kataskeyi_xwroi;

CREATE TABLE `kataskeyi_xwroi` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `id_zwnis` int(11) NOT NULL,
  `name` varchar(39) DEFAULT NULL,
  `mikos` decimal(7,4) DEFAULT NULL,
  `platos` decimal(7,4) DEFAULT NULL,
  `ypsos` decimal(7,4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;




DROP TABLE kataskeyi_zwnes;

CREATE TABLE `kataskeyi_zwnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `xrisi` int(11) NOT NULL,
  `thermoeparkeia` int(11) NOT NULL,
  `klines` decimal(5,2) NOT NULL,
  `anigmeni_thermo` int(11) NOT NULL,
  `aytomatismoi` int(11) NOT NULL,
  `kaminades` int(11) NOT NULL,
  `eksaerismos` int(11) NOT NULL,
  `anem_orofis` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




