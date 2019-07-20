#!/bin/bash

# 1-repertoire_courant
## Écrire un script qui affiche le nom complet (absolu) du répertoire courant
pwd

#2-toc_toc_toc_qui_est_la
## Écrire un script qui liste le contenu du répertoire courant
ls 

#3-rentrer_maison
## 

#4-qui_a_le_droit
ls -la

#5-cache_cache
## Écrire un script qui liste l’intégralité des fichiers du répertoire courant, y compris les répertoires et fichiers cachés, au format long
ls -a


#6-retour_vers_le_futur
##Écrire un script qui nous permet de revenir au répertoire précédent
cd -

# 7-vide_sideral
## Écrire un script qui créé un fichier vide eemi dans le répertoire courant
mkdri eemi

# 8-cours_forest
##Écrire un script qui rend le fichier eemi exécutable uniquement pour le propriétaire
chmod u+x eemi 

#9-a_moi
## Écrire un script qui rend le fichier eemi exécutable pour le groupe du propriétaire et qui
##retire les permissions d’exécution aux utilisateurs qui ne sont ni propriétaire ni dans le
##groupe du fichier, *sans changer les autres droits d’accès en lecture et écriture*
chmod 670 file -eemi

# 10-my_name_is_bond
## Écrire un script qui, pour le fichier eemi, retire tous les droits au propriétaire et au groupe et donne tous les droits aux autres utilisateurs
chmod 007 file -eemi

# 11-humanite
## Écrire un script qui change le groupe du fichier eemi pour ubuntu
mv eemi ubuntu

# 12-temporaire
##12.Écrire un script qui deplace le fichier eemi dans le répertoire /tmp
mv eemi /tmp

# 13-inutile
## 13.Écrire un script qui efface le fichier /tmp/eemi
rm /tmp/eemi

# 14-maj
## 14.Écrire un script qui copie tous les fichiers du répertoire courant dans le répertoire parent
## en ne copiant que les fichiers qui ont été mis à jour ou créés depuis la dernière fois

cp . ../

# 15-c_est_capital
## 15.Écrire un script qui copie dans le répertoire courant les fichiers du répertoire /tmp si ils
## commencent par une majuscule 
cp  . /tmp | grep "^[A-Z]"

# 16-point_de_non_retour
## Écrire un script qui efface tous les fichiers se terminant par .bak dans le répertoire
## courant
rm rm *.bak

# 17-nettoyage_de_printemps
## Écrire un script qui efface tous les fichiers se terminant par .bak dans le répertoire
##courant et tous les sous-répertoires
rm -r *.bak

# 18.Écrire un script qui crée les répertoires bienvenue, bienvenue/a, bienvenue/a/l,
# bienvenue/a/l/eemi dans le répertoire courant. Seuls 2 caractères “espace” sont
 #acceptés dans ce script.

tab=(bienvenue bienvenue/a bienvenue/a/1)
for((i=0;i<3;i++)); do mkdir ${tab[i]}
done

#19.Écrire un script qui affiche Hello, World ! suivi d’un retour à la ligne
echo -e 'Hello,world !\r'

# 20.Écrire un script qui affiche le smiley “j’ai pas compris” (8 caractères, guillemets compris) :
#"\(Ôo)/'
echo "\(Ôo)/'"

#21.Écrire un script qui affiche le contenu du fichier /etc/passwd
cat /etc/passwd

#22.Écrire un script qui affiche le contenu de /etc/networks et /etc/hosts
cat /etc/networks && cat /etc/hosts

# 23.Écrire un script qui affiche les 5 premières lignes de lorem_ipsum
cat lorem_ipsum | head -5

# 24.Écrire un script qui affiche les 5 dernières lignes de lorem_ipsum
cat lorem_ipsum | tail -5

# 25.Écrire un script qui affiche les lignes 6 à 10 de lorem_ipsum
cat lorem_ipsum | head -10 | tail -4

# 26.Écrire un script qui duplique la dernière ligne du fichier lorem_ipsum dans ce même fichier
cat lorem_ipsum | tail -1 >> lorem_ipsum

# 27.Écrire un script qui déduplique les lignes du fichier lorem_ipsum
cat lorem_ipsum  >> new_loremIpsum

# 28.Écrire un script qui affiche toutes les lignes qui contiennent lorem dans le fichier
grep -w "lorem" lorem_ipsum

# 29.Écrire un script qui affiche les lignes qui contiennent lorem ou Lorem dans le fichier
egrep -w 'lorem|Lorem' lorem_ipsum

# 30.Écrire un script qui affiche les lignes qui contiennent lorem, Lorem ou ipsum dans le
egrep -w 'lorem&&Lorem|ipsum' lorem_ipsum


