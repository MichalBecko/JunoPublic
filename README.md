<h1><strong>Predprodukčn&yacute; container pre Juno.</strong></h1>
<p>Juno si sťahuje z gitu.</p>
<p>Dodatočne sa sprav&iacute; composer update.</p>
<p>DB impoprtuje t&uacute;, ktor&aacute; je priložen&aacute; v tomto bal&iacute;ku.</p>
<p>Ako tento bal&iacute;k použiť?</p>
<p>Je potrebn&eacute; stiahn&uacute;ť si tento s&uacute;bor</p>
<blockquote>
<p><strong><span style="color: #008000;">git clone https://git.denevy.eu/jkuna/juno-dockerfile</span></strong></p>
</blockquote>
<p>V&ocirc;jdeme do adres&aacute;ra</p>
<blockquote>
<p><strong><span style="color: #008000;">cd juno-dockerfile</span></strong></p>
</blockquote>
<p>N&aacute;sledne spust&iacute;me build.</p>
<blockquote>
<p><strong><span style="color: #008000;">docker build -t juno .</span></strong></p>
</blockquote>
<p>Po dokončen&iacute; vytvorenia buildu si spust&iacute;me container.</p>
<blockquote>
<p><strong><span style="color: #008000;">docker run --name juno -p 8080:80 -d juno</span></strong></p>
</blockquote>
<p>Alebo m&ocirc;žeme do pr&iacute;kazu zadať požiadavku o vytvorenie db, usera a hesla podľa vlastn&yacute;ch požiadaviek</p>
<blockquote>
<p><strong><span style="color: #008000;">docker run --name juno -p 8080:80 -d -e 'DB_USER=meno' -e 'DB_PASS=heslo' -e 'DB_NAME=nazov' juno</span></strong></p>
</blockquote>
<p>N&aacute;sledne e&scaron;te spust&iacute;me v containeri apache nasleduj&uacute;cim pr&iacute;kazom</p>
<blockquote>
<p><span style="color: #008000;"><strong>docker exec -i juno service apache2 start</strong></span></p>
<p>&nbsp;</p>
</blockquote>
<p><span style="color: #0000ff;">To je v&scaron;etko! Pr&iacute;jemn&eacute; využ&iacute;vanie Juna!<br /></span></p>
