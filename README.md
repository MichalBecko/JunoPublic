Testovaci container pre Juno.<br>
Táto verzia neobsahuje vendor v adresári Juno. Stiahne sa dodatočne sám so vstavaným príkazom composer update. <br>

Stiahneme súbory <br>
git@git.denevy.eu:jkuna/juno-dockerfile.git

Vojdeme do adresára<br>
cd juno-dockerfile

Po stiahnutí vytvoríme build Juna:<br>
docker build -t juno:Dockerfile .

Spustíme kontainer:<br>
docker run --name juno -p 8080:80 -d juno:Dockerfile

Obnovíme databázu zo zálohy:<br>
docker exec -i juno mysql -ujuno -pjuno juno < junodb_new.sql

Spustíme apache:<br>
docker exec -i juno service apache2 start


To je všetko!

V ďalších verziách pribudne návod na ssl, prípadne zmeny v db.
