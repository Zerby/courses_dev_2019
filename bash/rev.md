## CORRECTION DST :

**Quelle commande permet d’aller dans le répertoire /etc (depuis n’importe où)?**

``` shell
cd /etc ( -> le / permet d’écrire le chemin absolu)
```

**Quelle commande permet de retourner dans le répertoire personnel de l’utilisateur ?**

``` shell
cd ~
```

**Quelle commande permet de retourner dans le répertoire personnel de l’utilisateur ?**

``` shell
cd -
```

**Quelle commande permet de retourner dans le répertoire parent?**

``` shell
cd ..
```

**Quelle commande liste le contenu d’un répertoire ?**

``` shell
ls
```

**Quelle commande liste le contenu d’un répertoire au format long, y compris les fichiers et dossiers cachés ?**

``` shell
ls -la
```

**Quelle commande liste le contenu des répertoires /etc et /bin?**

``` shell
ls /etc /bin
```

**Quelle commande liste le contenu du répertoire /etc dans le fichier tmp/configurations.log?**

``` shell
ls /etc > /tmp/configurations.log
```

**Quelle commande liste le contenu des répertoires /var/www/eemi et /tmp/eemi? Affiche erreur dans fichier /var/log/eemi.err si un des répertoires n’existe pas.**

``` shell
ls /var/www/eemi /tmp/eem 2>> /var/log/eemi.err
```

**Quelle commande liste tous les fichiers du répertoire /etc qui se terminent par conf ?**

``` shell
ls /etc/*.conf
```

**Quelle commande liste tous les fichiers du répertoire /etc qui commencent par une majuscule ?**

``` shell
ls /etc | grep “^[A-Z]” OU ls /etc/[A-Z]*
```

**Quelle commande liste tous les fichiers du répertoire /var/log qui contiennent un chiffre ?**

``` shell
ls /var/log | grep “[0-9]”. OU ls /var/log*[0-9]*
```

**Quelle commande liste les fichiers du répertoire parent dont l'extension est exactement de 3 caractères?**

``` shell
ls ../*.???
```

**Quelle commande efface le fichier /tmp/temporary_file?**

``` shell
rm /tmp/temporary_file
```

**Quelle commande efface le répertoire /tmp/temporary_file?**

``` shell
rm -r /tmp/temporary_file
```

**Quelle commande permet de changer les droits d’exécution de l’utilisateur sans changer les droits du groupe et des autres utilisateurs ?**

``` shell
chmod u+x script.sh (user + execution)
```

Les droits sur un fichier :


![Access Rights](accessRights.jpg

chmod 117 oss.txt (execution utilisateur courant et groupe, tous les droits au propriétaire)

chmod u+x,g+x,o-x script.sh

chown :ubuntu script.sh

chgrp -R ubuntu ~/src/*

**Quelle commande permet de créer une clé ssh id_rsa_eval de 1024 bits avec le mot de passe protected ?**

``` shell
ssh-keygen -b 1024 -t rsa -N protected -f ~/.ssh/id_rsa_eval
```

**Quelle commande permet de se connecter au serveur 62.39.143.50 avec l’utilisateur courant ?**

``` shell
ssh 62.39.143.50
```

**Quelle commande permet de se connecter au serveur 192.168.10.4 avec l’utilisateur admin_web en utilisant la clé SSH id_rsa_prod ?**

``` shell
ssh -i ~/ssh/id_rsa_prod admin_web@192.168.10.4
```

**Créer un répertoire tmp dans le répertoire personnel de l’utilisateur ?**

``` shell
mkdir ~/tmp
```

mkdir -p 1/3/6/2/6/8

**Efface le répertoire vide /tmp/vide ?**

``` shell
rm /tmp/vide (not sure)
```

**Efface le répertoire non vide /tmp/nonvide ?**

``` shell
rm -r /tmp/nonvide
```

**Affiche et décompresse à l'écran le fichier access.log.bz2 ?**

``` shell
bzcat access.log.bz2
```

**Quelle commande permet de décompresser le fichier compressé au format gzip : access.log.gz ?**

``` shell
gunzip access.log.gz
```

**Quelle commande extrait la date et l'heure de création de chaque fichier présent dans le répertoire /dev ?**

``` shell
ls -l /dev | cut -c 37-48 //cut -c = character
```

**Compte le nombre d'occurence de chaque heure et date de création unique :**

``` shell
ls -l /dev | cut -c 37-48 | sort | uniq -c
```

bzcat listing.csv.bz2 | head -n 100

**Affiche 6ème champ du fichier nasa.tsv ?**

``` shell
cut -f 6 nasa.tsv //cut -f = field
```

**Compte le nombre d'occurence unique du 6ème champ du fichier nasa.tsv ?**

``` shell
cut -f 6 nasa.tsv | sort | uniq -c // -c = compte le nombre d\'occurences
```

**Affiche le top 5 du nombre d'occurence unique du 6ème champ du fichier nasa.tsv ?**

``` shell
cut -f 6 nasa.tsv | sort | uniq -c | head -5
```

**Afficher l'expace disque disponible :**

``` shell
df -h
```

cut -f 6 nasa.tsv | sort | uniq -c | sort -n | tail -5

**Décompresse et affiche les 1000 premières lignes du fichier, affiche le 7ème champ, tri les lignes et ne garde que les lignes différentes, tri de facçon décroissante et affiche le nombre d'occurences :**

``` shell
bzcat fileName | head -1000 | cut -d ' ' -f 7 | sort | uniq -c | sort -rn // cut -d = delimiteur
```

*(dezip les 100 premières lignes du fichier | segmente les lignes par espace et affiche le 9ème champ | organise | groupe et affiche le nombre d’occurences | affiche dans Less (super utile pour les longs fichiers))*

**Article le plus consulté :**

``` shell
bzcat 2014-09.log.bz2 | head -100000 | cut -d ' ' -f 7 | grep "/article/" | sort | uniq -c | sort -r | head -1
```

**Catégories les plus consultées :**

``` shell
bzcat 2014-09.log.bz2 | head -100000 | cut -d ' ' -f 7 | grep "/categorie/" | sort | uniq -c | sort -r | head -10
```

**Total des données transférées :**

``` shell
???
```

**Liste les codes HTTP des 100 permiers articles par ordre décroissant et le temps de l'opération (time) :**

``` shell
time bzcat 2014-09.log.bz2 | head -100000 | cut -d ' ' -f 7,9 | grep "/article/" | cut -d ' ' -f 2 | sort | uniq -c | sort -r
```

``` shell
bzcat 2014-09.log.bz2 | head -100000 | wc -1
```

**Extrait dans un fichier de logs les 100000 premières lignes :**

``` shell
bzcat 2014-09.log.bz2 | head -100000 > 2014-09-100000.log
```

``` shell
bzcat 2014-09.log.bz2 | head -100000 | cut -d ' ' -f 10 | paste -sd + | bc
```

s = serialize
d = remplace la tabulation par un +

**Fusionne des lignes de fichiers ensemble :**

``` shell
paste fichier1 fichier2 fichier3
```

Ephémère :

bzcat (décompresse et affiche)
head
cut
grep
uniq

Persistant :

sort

``` shell
cut -d ' ' -f 9 filename | sort
```

``` shell
paste 2014-09*.stats
```

``` shell
docker container run hello-world (lance une image container nommée hello-world)
```

```
docker container run -it ubuntu bash
```

1/ Lancer un container NGINX et valider dans navigateur

``` shell
docker container run -p 8080:80 -it nginx:latest
```
2/ Lancer un container MariaDB 10.1

``` shell
docker container run -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -p 3307:3306 -it mariadb:10.1
```

Show mysql processes :

``` shell
ps ax | grep "mysql"
```
