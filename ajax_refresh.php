L'EntityRepository propose par défaut quelques méthodes dont findby et findOneBy . La methode findbyidentifiant retourne une liste d'instances d'utilisateur  ayant un identifant spécifique passé en paramètre alors qu'a l'inverse la methode findOnebyidentifiant retourne une seule instance d'utilisateur ayant comme identifiant celle qui sera passé en paramètre de cette méthode .Donc en gros la methode findOneByidentifiant fonctionne comme la méthode findByidentifiant mais retourne un unique résultat et non pas un table.