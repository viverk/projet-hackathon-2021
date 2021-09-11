# Hackathon Février 2021 

## Thème
Conception d'un prototype de reconnaissance et traitement de signal audio à connecter sur un Wello (vélo-cargo électrique à énergie solaire) à destination de la délégation ministérielle pour l'intelligence artificielle. 

Context:  https://www.linkedin.com/posts/lycee-le-rebours_4e-%C3%A9dition-du-hackathon-le-rebours-avec-la-activity-6764580856175575040-LWbI

![image](https://user-images.githubusercontent.com/74957427/132962349-9af2f502-6f52-4099-a9af-210350a444ee.png)
![image](https://user-images.githubusercontent.com/74957427/132962351-73828afc-5868-48f3-bc48-2a8484d0532d.png)


## Installation 

Ce programme a été testé avec les configurations suivantes:
- Ubuntu 20.04
- Mysql 8.0.23
- Python3.8

1. Cloner ce dépôt : 
```
git clone https://github.com/Welyweloo/hackaton-sound-detection.git
cd sound-detector
```

2. Installer les pré-requis :
```
sudo apt-get install portaudio19-dev
pip install -r requirements.txt
```

3. Pour lancer le programme de reconnaissance et traitement de signal audio 
```
python3 detect-record-classify.py
```


## Use Cases 

Ce programme est développé pour répondre aux fonctionnalités mentionnées ci-dessus. Pour toute démonstration, vous trouverez ci-dessous le scénario pour lequel il a été conçu.

Utilisateur: *Agent de proximité partant en patrouille*

1. **En tant qu'Utilisateur**, **je peux** monter à bord de mon Wello et fixer mon assistant connecté (le Raspberry sur lequel sont branchés un micro, une carte 4G) **afin** qu'il soit stable.

    >**Point technique** : L'interface web est codée en PHP et JS Vanilla, elle communique avec le Raspberry via une API qui stocke les données sur une base de données MySQL.


2. **En tant qu'Utilisateur**, **je peux** saisir  partir d'une interface web sur mobile l'immatriculation de mon Wello **afin** que l'assistant connecté sache à bord de quel Wello il effectuera sa mission.

    >**Point technique** : Le numéro d'immatriculation sera utile pour chaque saisie en base de données, l'objectif est d'identifier le Wello.

3. **En tant qu'Utilisateur**, **je peux** cliquer sur 'Commencer ma tournée' sur interface web sur mobile **afin** de lancer le programme de reconnaissance et traitement de signal audio.

    >**Point technique** : Le programme écoutera en permanence les sons environnants, selon l'intensité du bruit, il déclenchera ou non un enregistrement qui sera analysé par un moteur Tensorflow grâce à une intelligennce artificielle entraînée sur 524 types de sons. En quelques secondes la nature du son sera stockée en base de donnée, ainsi que la date et l'heure.

4. **En tant qu'Utilisateur**, **je peux** visualiser via interface web sur mobile le statut du programme : signal vert (ok) ou signal rouge clignonant (problème), **afin** de savoir si un son anormal a été identifié.

    >**Point technique** : Ce signal pourra éventuellement être remplacé par une led directemennt branchée sur un port GPIO du Raspberry.

5. **En tant qu'Utilisateur**, après avoir entendu un son et constaté le changement de signal au rouge clignotant sur interface web sur mobile **je suis** informé qu'une notice a été envoyée aux équipes de renfort, **afin** qu'elles se tiennent prêtes le temps que j'arrive sur site.

6. **En tant qu'Utilisateur**, après mon arrivée sur site, **je peux** signaler une fausse alerte via une interface web, **afin** de signifier aux équipes que le son n'a occasionné aucun danger.

7. **En tant qu'Utilisateur**, après mon arrivée sur site, **je peux** cliquer sur le bouton 'Confirmer le signalement' sur l'interface web, **afin** de démarrer un enregistrement vocal pendant que je sécurise les lieux. 

8. **En tant qu'Utilisateur**, **je peux**  transmettre des informations verbales aux renforts ainsi que le code interne de la situation rencontrée (120 pour une fusillade par exemple) **afin** d'identifier les équipes et leur donner de la visibilité.

    >**Point technique** : C'est l'API Speech Recognization (Javasript) qui permettra grâce à une intelligence artificielle de réaliser du "speech to text" afin de sauvegarder le message verbal en texte dans la base de donnée.

9. **En tant qu'Assistant de Régulation**, **je peux**  être alerté sur un problème signalé par l'un agent par e-mail **afin** de faire remonter le problème à ma hiérarchie.

10. **En tant qu'Utilisateur**, **je peux** cliquer sur 'Terminer la session' quand ma tournée est terminée **afin** de stopper le programme de reconnaissance et traitement de signal audio.

## Sources utilisées 

- Pour la détection et l'enregistrement du son, la base de code est fournie ici : https://stackoverflow.com/a/50340723/13987580

- Pour la classification du son, la base de code est fournie ici :  https://www.tensorflow.org/hub/tutorials/yamnet

- Pour la création du code de reconnaissance vocale, la documentation est fournie ici : https://developer.mozilla.org/en-US/docs/Web/API/SpeechRecognition/onresult

## Auteurs
Aurélie - Benjamin - Maxime - Viverk
