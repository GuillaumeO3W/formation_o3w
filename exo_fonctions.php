<?php

// Exercice 1 :
// Créez une fonction qui prend un nombre en tant que paramètre et calcule puis renvoi la
// valeur absolue d’un nombre.


// $number = (int) readline ('entrez un nombre pour connaitre sa valeur absolue :');

// function absolute(int $number):int {
//     if ($number>=0){
//         $absolute = $number;
//     }else{
//         $absolute = -$number;
//     }
//     return $absolute;
// }
// echo "la valeur absolue de $number est ". absolute($number);


// ----------------------------------------------------------------------------------------

// Exercice 2 :
// Créez une fonction qui prend une chaîne de caractères en tant que paramètre et
// supprime les voyelles d’une chaine de caractères puis renvoie la chaine modifiée.
// (pensez à regarder la doc PHP une ou plusieurs fonction(s) pourrait vous servir)


// $userText = (string) readline ('entrez une phrase : ');

// function suppVoyelles (string $text):string {
//     $voyelles = [
//             "a" => "",
//             "e" => "",
//             "i" => "",
//             "o" => "",
//             "u" => "",
//             "y" => "",
//             "A" => "",
//             "E" => "",
//             "I" => "",
//             "O" => "",
//             "U" => "",
//             "Y" => "",
//     ];
//     return strtr("$text", $voyelles);
// }

// echo suppVoyelles ($userText);

// ----------------------------------------------------------------------------------------

// Exercice 3 :
// Créez une fonction qui prend une chaîne de caractères en tant que paramètre et
// renvoie le nombre de voyelles (a, e, i, o, u, y) présentes dans la chaîne. La fonction doit
// être insensible à la casse, ce qui signifie qu'elle doit compter à la fois les voyelles en
// majuscules et en minuscules. Testez la fonction avec différentes chaînes.
// (pensez à regarder la doc PHP une ou plusieurs fonction(s) pourrait vous servir)


// $str = (string)readline ('entrez une phrase :');

// function calculNbVoyelles(string $str):int{
//     $strArray = count_chars($str,1);
//     $voyellesArray = ['a','A','e','E','i','I','o','O','u','U','y','Y'];
//     $nbVoyelles = 0;
//     foreach ($strArray as $caractere=>$nbDeFois) {
//         foreach ($voyellesArray as $key2=>$voyelle){
//             if(chr($caractere) == $voyelle){
//                 $nbVoyelles += $nbDeFois;
//             }
//         }
//     }
//     return $nbVoyelles;
// }    
// echo "Cette phrase comporte ".calculNbVoyelles($str)." voyelle(s)";

// ----------------------------------------------------------------------------------------

// Exercice 4 :
// Créez une fonction qui prend une chaîne de caractères en tant que paramètre et
// renvoie la chaîne avec l'ordre des mots inversé. Chaque mot dans la chaîne doit rester
// inchangé, mais l'ordre des mots doit être inversé. Testez la fonction avec différentes
// chaînes de caractères.
// (pensez à regarder la doc PHP une ou plusieurs fonction(s) pourrait vous servir)

// $str = (string)readline ('entrez une phrase :');

// function ordreInverse($str){

//     $arr = explode(" ",$str);
//     $arrReversed = array_reverse($arr);

//     foreach ($arrReversed as $key => $word){
//         echo $word." ";
//     }
// }
// echo ordreInverse($str);

// ----------------------------------------------------------------------------------------

// Exercice 5 :

// Exercices fonctions 2
// Créez une fonction qui génère un mot de passe aléatoire. Le mot de passe devrait avoir
// une longueur donnée en paramètre et contenir des lettres majuscules, des lettres
// minuscules et des chiffres. Testez la fonction en générant des mots de passe de
// différentes longueurs.
// (pensez à regarder la doc PHP une ou plusieurs fonction(s) pourrait vous servir)

// function getPwd( $longPwd){

//     $arrayNum = ['0','1','2','3','4','5','6','7','8','9'];
//     $arrayMin = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
//     $arrayMaj = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

//     for ($i=1 ; $i<= $longPwd ; $i++ ){
//             echo $arrayNum[array_rand($arrayNum)];
//             echo $arrayMin[array_rand($arrayMin)];
//             echo $arrayMaj[array_rand($arrayMaj)];
//     }
// }
// getPwd (4);

// ------------------------------------------------------------------------------------

// function CreatePass($long_pass)
// {
// $min = "abcdefghjklmnopqrstuvwxyz";
// $maj = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
// $nb = "123456789";
// $mdp='';
// for ($i=0; $i < $long_pass; $i++)
// {
// if (($i % 2) == 0)
// {
// $mdp = $mdp.substr ($min, rand(0,strlen($min)-1), 1);
// }
// else
// {
// $mdp = $mdp.substr ($nb, rand(0,strlen($nb)-1), 1);
// }
// }

// return $mdp;
// }

// $motdepasse = CreatePass(8); /*mot de passe de 8 caracteres */
// echo 'Mot de passe généré: '.$motdepasse;

// ----------------------------------------------------------------------------------------

// Exercice 6 :
// Créez une fonction qui qui prend un tableau en tant que paramètre de la structure
// suivante :

// $books = [
//     [
//         'name' => 'nom du livre',
//         'author' => 'nom de l\'auteur',
//         'releaseYear' => 2023,
//         'purchaseUrl' => 'http://exemple.com'
//     ]

// ];

// remplissez un tableau de 6 livres et filtrer un tableau de livre par l’auteur.


// $books = [
//     [
//         'name' => 'Et Après...',
//         'author' => 'Guillaume Musso',
//         'releaseYear' => 2004,
//         'purchaseUrl' => 'https://www.amazon.fr/Apr%C3%A8s-Guillaume-Musso-ebook/dp/B078QYGV4T/ref=zg_bs_301132_sccl_4/257-7811771-1836039?psc=1'
//     ],
//     [
//         'name' => 'Sauve-moi',
//         'author' => 'Guillaume Musso',
//         'releaseYear' => 2005,
//         'purchaseUrl' => 'https://www.amazon.fr/gp/product/B078QYYHB8/ref=dbs_a_def_rwt_hsch_vapi_tkin_p1_i3'
//     ],
//     [
//         'name' => 'Tout le bleu du ciel',
//         'author' => 'Mélissa Da Costa',
//         'releaseYear' => 2020,
//         'purchaseUrl' => 'https://www.amazon.fr/Tout-bleu-ciel-Melissa-Costa/dp/2253934100/ref=zg_bs_301132_sccl_8/257-7811771-1836039?psc=1'
//     ],
//     [
//         'name' => 'La Faille',
//         'author' => 'Franck Thilliez',
//         'releaseYear' => 2023,
//         'purchaseUrl' => 'https://www.amazon.fr/Faille-Thriller-%C3%A9v%C3%A9nement-Nouveaut%C3%A9-2023/dp/226515556X/ref=zg_bs_301132_sccl_9/257-7811771-1836039?psc=1'
//     ],
//     [
//         'name' => 'La vie qui m\'attendait',
//         'author' => 'Jean Anouilh',
//         'releaseYear' => 2019,
//         'purchaseUrl' => 'https://www.amazon.fr/vie-qui-mattendait-Litt%C3%A9rature-Fran%C3%A7aise-ebook/dp/B07N8CSFW5/ref=zg_bs_301132_sccl_10/257-7811771-1836039?psc=1'
//     ],
//     [
//         'name' => 'Antigone',
//         'author' => 'Julien Sandrel',
//         'releaseYear' => 2016,
//         'purchaseUrl' => 'https://www.amazon.fr/Antigone-Jean-Anouilh/dp/2710381419/ref=zg_bs_301132_sccl_11/257-7811771-1836039?psc=1'
//     ]
// ];



// function filterAuthor($arrBooks,$author){

//     foreach ($arrBooks as $value){

//         $value['author'] = strtolower($value['author']);
//         $author = strtolower ($author);
        
//         if (strpos($value['author'],$author) !==false){
//             echo $value['name'];
//             echo " (".$value['releaseYear'].")".PHP_EOL;
//         }
//     }
// }

// $choiceAuthor = readline ('Choississez un auteur : ');
// filterAuthor ($books,$choiceAuthor);

