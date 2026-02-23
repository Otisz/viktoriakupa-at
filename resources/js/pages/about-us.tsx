import { Head } from "@inertiajs/react";
import AppLayout from "@/layouts/app-layout";

export default function Page() {
  return (
    <AppLayout>
      <Head title="Rólunk"></Head>
      <main className="container space-y-12 py-12 max-w-[80ch] prose">
        <section>
          <h1>
            Akrobatikus Torna - Viktória Kupa <br /> versenyrendszer története
          </h1>
          <p>
            A versenyrendszer története 2011-ben kezdődött Start Kupa néven, amikor néhány egyesület összefogásával
            elindult egy szabadidős akrobatikus versenysorozat, kezdetben mintegy 20–25 versenyző részvételével.
          </p>
          <p>
            A cél az volt, hogy versenyzési lehetőséget biztosítsunk azoknak is, akik nem a klasszikus
            versenyrendszerben sportolnak, mégis szeretnék megmérettetni magukat, fejlődni, és valódi versenyélményt
            szerezni az akrobatikus torna világában.
          </p>
          <p>
            A sportág fejlődésével párhuzamosan a versenyrendszer is folyamatosan bővült. 2017-re jelentősen megnőtt a
            résztvevők száma, és a szabadidős sportolók mellett megjelentek a „B” kategóriás versenyzők is. A fejlődés
            hatására ekkor a versenyrendszer új nevet kapott, megszületett a{" "}
            <span className="font-bold">Viktória Kupa</span>.
          </p>
          <p>
            A COVID időszak komoly kihívások elé állította a sportéletet, ugyanakkor a Viktória Kupa rendszer számára
            fejlődési lehetőséget is hozott. A leigazolások szükségessé válása pozitív hatással volt a rendszerre,
            hiszen jelentősen nőtt a hivatalosan leigazolt „B” kategóriás versenyzők száma, akik aktívan részt is vettek
            a versenyeken.
          </p>
          <p>
            A versenyrendszer különlegessége, hogy a FIG kategóriák mellett számos további versenyszám is helyet kap
            benne:
            <ul>
              <li>kézállófa</li>
              <li>ugrás</li>
              <li>talajgyakorlat</li>
              <li>Free Style</li>
              <li>társas kategóriákban vegyes hármas és női négyes egységek</li>
            </ul>
          </p>
          <p>
            A COVID utáni időszakban a versenyzői létszám ugrásszerűen növekedett, és rövid időn belül közel 150 főre
            emelkedett a szabadidős és leigazolt sportolók száma. 2021-től kezdődően a növekedés tovább gyorsult, és
            napjainkra már több mint 300 versenyző alkotja a Viktória Kupa közösségét, már 10 hazai egyesület és két
            iskola részvételével.
          </p>
          <p>
            2023-tól a Viktória Kupa nemzetközi szinten is megjelent. A szabályzat alkalmazkodott a nemzetközi
            elvárásokhoz, így versenyzőink már többek között Olaszországban, Portugáliában és Bulgáriában is
            versenyezhetnek, ahol van lehetőség a másodosztályt is indítani.
          </p>
          <p>
            Történelmi mérföldkő, hogy a Magyar Torna Szövetség bizalmat szavazott a rendszernek, és 2025-től a Viktória
            Kupa Országos Bajnoki versenyrendszerként is működhet.
          </p>
          <p>
            A Viktória Kupa nem csupán verseny. Egy közösség, egy fejlődési út és egy lehetőség arra, hogy minél többen
            megtapasztalják az akrobatikus torna világát.
          </p>
          <p className="font-bold">Az akrobatikus torna egy életre szól.</p>
        </section>

        <section>
          <h2>Mottónk</h2>
          <p>Örülünk, ha az ellenfél, jól felkészült, mert így veszteni nem szégyen, de győzni dicsőség!</p>
        </section>

        <section>
          <h2>Akrobatikustorna</h2>
          <p>
            Az akrobatikus torna egy látványos, dinamikus és művészi sportág, amely erőt, rugalmasságot, egyensúlyt és
            koordinációt igényel. A sportolók párokban vagy csoportokban dolgoznak együtt, hogy lenyűgöző emeléseket,
            dobásokat és egyéb akrobatikus elemeket hajtsanak végre.
          </p>
          <p>
            Az ország több pontján, Pesten és Budán 10 egyesületben szakképzett edzők irányításával, biztonságos
            környezetben sajátíthatják el a gyerekek és fiatalok ennek a különleges sportágnak az alapjait és
            fejleszthetik képességeiket akár versenyszintig.
          </p>
        </section>

        {/*<section>*/}
        {/*  <p>*/}
        {/*    Start Kupa néven 2011-04-08 indult útjára a mai nevén ismert Viktória Kupa Versenysorozat. A szabadidős*/}
        {/*    versenyzők felkarolása volt a kezdeti cél, ami a mai napig fontos és elidegeníthetetlen eleme a*/}
        {/*    versenysorozatnak. Az idő és a változások kényszer(Covid) és lehetőségek (szabályok modosítása) lehetővé*/}
        {/*    tette, hogy a fő tevékenység mellett "B" kategóriás és az "A" kategóriás versenyzők is rajthoz állhanak.*/}
        {/*    Kiülön kiemelendő, hogy 2025 ben történelmet írt a Magyar Akrobatikus Torna, hiszen az "A" kategória Magyar*/}
        {/*    Bajnoki címe mellett már a Viktória Kupa "B" kategóriás versenyzői is megkaptákták a lehetőséget, hogy*/}
        {/*    Országos Bajnokságon vegyenek részt a Viktória Kupa versenysorozatában.*/}
        {/*  </p>*/}
        {/*  <p>*/}
        {/*    A Viktória Kupa nem csak egy verseny – ez egy közösség, ahol a mozgás szeretete, az esélyegyenlőség és a jó*/}
        {/*    hangulat az első. Nálunk a fair play nem csak szó, hanem életforma. Azt kívánjuk, hogy az ellenfél is a*/}
        {/*    legjobb formáját hozza – mert csak a legerősebbek ellen születhet igazi dicsőség. És ne feledd: nem a*/}
        {/*    győzelem számít, hanem az út, amin együtt haladunk!*/}
        {/*  </p>*/}
        {/*</section>*/}
        {/*<img src="/images/about-us.jpg" className="w-full rounded-2xl" alt="Rólunk" />*/}
        {/*<div className="container max-w-[80ch] space-y-12">*/}
        {/*  <div className="flex">*/}
        {/*    <span className="flex-1 text-xl font-bold">Viktória Kupa - Akrobatikus Torna</span>*/}
        {/*    <span className="flex-1">*/}
        {/*      Mi, a Viktória Kupa Versenysorozat Akrobatikus Torna edzői, szervezői, büszkén állunk az országos szintű*/}
        {/*      versenyszervezésünk mögött. Célunk, hogy lehetőséget biztosítsunk az akrobatikus torna tehetséges*/}
        {/*      tornászainak, hogy megmutathassák tudásukat és versenyezhessenek egymással.*/}
        {/*    </span>*/}
        {/*  </div>*/}
        {/*</div>*/}
      </main>
    </AppLayout>
  );
}
