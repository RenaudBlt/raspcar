#!/bin/bash

#traitement pour recuperer seulement les tailles
df -h | head -n 2 | tail -n 1 > ligne
cut -c28-37 ligne > taille
sed -e 's/G//g' taille > valeur
sed -e 's/  / /g' valeur > valeur2
sed 'y, ,\n,' valeur2 > val

utilise=$(head -n 1 val)
disponible=$(tail -n 1 val)
echo 'taille utilise : ' ${utilise}
echo 'taille disponible : ' ${disponible}
rm ligne
rm taille
rm valeur
rm valeur2
rm val
