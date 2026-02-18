import { Head } from "@inertiajs/react";
import AppLayout from "@/layouts/app-layout";

export default function Page() {
  return (
    <AppLayout>
      <Head title="Rólunk"></Head>
      <main className="container space-y-12 px-4 pt-8 pb-20">
        <div className="container max-w-[80ch] space-y-12">
          <p className="leading-8 text-[#bb4747]">
            Start Kupa néven 2011-04-08 indult útjára a mai nevén ismert Viktória Kupa Versenysorozat. A szabadidős
            versenyzők felkarolása volt a kezdeti cél, ami a mai napig fontos és elidegeníthetetlen eleme a
            versenysorozatnak. Az idő és a változások kényszer(Covid) és lehetőségek (szabályok modosítása) lehetővé
            tette, hogy a fő tevékenység mellett "B" kategóriás és az "A" kategóriás versenyzők is rajthoz állhanak.
            Kiülön kiemelendő, hogy 2025 ben történelmet írt a Magyar Akrobatikus Torna, hiszen az "A" kategória Magyar
            Bajnoki címe mellett már a Viktória Kupa "B" kategóriás versenyzői is megkaptákták a lehetőséget, hogy
            Országos Bajnokságon vegyenek részt a Viktória Kupa versenysorozatában.
          </p>
          <p className="leading-8 font-extrabold">
            A Viktória Kupa nem csak egy verseny – ez egy közösség, ahol a mozgás szeretete, az esélyegyenlőség és a jó
            hangulat az első. Nálunk a fair play nem csak szó, hanem életforma. Azt kívánjuk, hogy az ellenfél is a
            legjobb formáját hozza – mert csak a legerősebbek ellen születhet igazi dicsőség. És ne feledd: nem a
            győzelem számít, hanem az út, amin együtt haladunk!
          </p>
        </div>
        <img src="/images/about-us.jpg" className="w-full rounded-2xl" alt="Rólunk" />
        <div className="container max-w-[80ch] space-y-12">
          <div className="flex">
            <span className="flex-1 text-xl font-bold">Viktória Kupa - Akrobatikus Torna</span>
            <span className="flex-1">
              Mi, a Viktória Kupa Versenysorozat Akrobatikus Torna edzői, szervezői, büszkén állunk az országos szintű
              versenyszervezésünk mögött. Célunk, hogy lehetőséget biztosítsunk az akrobatikus torna tehetséges
              tornászainak, hogy megmutathassák tudásukat és versenyezhessenek egymással.
            </span>
          </div>
        </div>
      </main>
    </AppLayout>
  );
}
