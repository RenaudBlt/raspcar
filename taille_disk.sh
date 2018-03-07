#!/bin/bash

#traitement pour recuperer seulement les tailles
df -h | head -n 2 | tail -n 1 > ligne
cut -c28-37 ligne > taille
sed -e 's/G//g' taille > valeur
sed -e 's/,/./g' valeur > valeur1
sed -e 's/  / /g' valeur1 > valeur2
sed 'y, ,\n,' valeur2 > val

utilise=$(head -n 1 val)
disponible=$(tail -n 1 val)
#echo 'taille utilise : ' ${utilise}
#echo 'taille disponible : ' ${disponible}
DATE=$(date +%Y-%m-%d)
echo "INSERT INTO stockage (id, date, disponible, utilise) VALUES ('', '$DATE', '$disponible', '$utilise');" | mysql -uadmin -prenaud vehicule;

rm ligne
rm taille
rm valeur
rm valeur1
rm valeur2
rm val
