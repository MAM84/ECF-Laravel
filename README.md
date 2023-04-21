#ECF Laravel

CEFIM : Formation : Cours PHP Laravel

Projet à rendre pour cette matière afin de valider la formation

Consignes :

Concevoir une mini boutique en ligne.
Cette boutique devra contenir au minimum 2 rayons contenant eux-mêmes au minimum 2 produits. Elle devra permettre de mettre au panier un produit, de le payer et de recevoir une confirmation de commande.
Vous allez devoir construire les différentes tables de votre base de données.
Vous devrez implémenter :
    • l'affichage des rayons,
    • l'affichage des produits,
    • la mise au panier,
    • l'affichage du panier,
    • la modification du panier,
    • l'enregistrement des coordonnées du clients,
    • le mode de livraison (a domicile -> l'adresse de livraison),
    • le paiement (stripe ou paypal en mode sandbox),
    • la gestion de la réponse du module de paiement : validation ou pas de la commande, envoi d'un email au client, enregistrement en log protégé (dossier non accessible du web) de la réponse du module de paiement.
La gestion back-office des produits, rayons, clients, n'est pas demandée. (OK fait)
La gestion front-office des clients, n'est pas demandée (OK fait)
La gestion des stocks n'est pas demandée. (OK fait)
La gestion par articles n’est pas demandée. (OK fait)
Obligations techniques : 
Toutes les informations produits, rayons, clients, commandes, seront stockées en base de données.
Vous devrez nous fournir le modèle relationnel de votre base (le schéma). L'architecture devra être en objet, vous pouvez réaliser la boutique en php objet ou via Laravel mais pas d’autres languages.
Pour aller plus loin
Si vous le souhaitez vous pouvez développez le back-office de gestion des produits des rayons et des commandes.

Note reçue : 18/20