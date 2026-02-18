import { Head } from "@inertiajs/react";
import AppLayout from "@/layouts/app-layout";

export default function Page() {
  return (
    <AppLayout>
      <Head title="Egyesületek"></Head>
      <main className="space-y-8 py-20">
        <div className="container max-w-[80ch] space-y-8">
          <p className="text-2xl text-center text-balance leading-9 md:text-3xl md:leading-12">
            A győzelem csak akkor igazi, ha a legjobbakkal méred össze magad.
            <br />
            Ha szereted az akrobatikát, a kihívást, és azt kívánod, hogy az ellenfeleid is erősek legyenek –
            <br />
            <span className="font-bold">akkor ez a Te helyed!</span>
            <br />
            Itt a küzdelem tiszta, a siker megérdemelt, az eredmény pedig közös dicsőség.
          </p>

          <p className="text-center text-balance">
            A Viktória Kupa Versenysorozat Akrobatikus Torna egy országos szintű versenysorozat, amelynek fő célja a
            magyar akrobatikus torna tehetségeinek felkutatása és fejlesztése.
          </p>
        </div>

        <div className="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4 container transition-all duration-1000 [&>a]:block">
          <figure className="mb-4">
            <img
              src="/images/logo_akro_art.png"
              alt="Akrobatikus Torna és Artistaművészeti Sporegyesület"
              className="rounded-2xl mx-auto"
            />
            <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
              Akrobatikus Torna és Artistaművészeti Sporegyesület
            </figcaption>
          </figure>
          <a href="http://erditornaclub.hu/" target="_blank" rel="noopener" className="group">
            <figure>
              <img
                src="/images/logo_etc.png"
                alt="Érdi Torna Club"
                className="rounded-2xl mx-auto group-hover:scale-110 transition"
              />
              <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
                Érdi Torna Club
              </figcaption>
            </figure>
          </a>
          <figure>
            <img
              src="/images/logo_akro.png"
              alt="Akrobatikus Tornasport Kft."
              className="rounded-2xl mx-auto group-hover:scale-110 transition"
            />
            <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
              Akrobatikus Tornasport Kft.
            </figcaption>
          </figure>
          <a href="http://www.fradi.hu/cimke/akrobatikus%20torna" target="_blank" rel="noopener" className="group">
            <figure>
              <img
                src="/images/logo_ftc.png"
                alt="Ferencvárosi Torna Club"
                className="rounded-2xl mx-auto group-hover:scale-110 transition"
              />
              <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
                Ferencvárosi Torna Club
              </figcaption>
            </figure>
          </a>
          <figure>
            <img
              src="/images/logo_atak.png"
              alt="Abonyi Torna és Akrobatika Klub"
              className="rounded-2xl mx-auto group-hover:scale-110 transition"
            />
            <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
              Abonyi Torna és Akrobatika Klub
            </figcaption>
          </figure>
          <a href="http://www.puente.hu/" target="_blank" rel="noopener" className="group">
            <figure>
              <img
                src="/images/logo_puente.jpg"
                alt="http://www.puente.hu/"
                className="rounded-2xl mx-auto group-hover:scale-110 transition"
              />
              <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
                http://www.puente.hu/
              </figcaption>
            </figure>
          </a>
          <a href="https://balancegym.hu/" target="_blank" rel="noopener" className="group">
            <figure>
              <img
                src="/images/logo_balance.jpg"
                alt="Balance Akrobatika & Torna Club"
                className="rounded-2xl mx-auto group-hover:scale-110 transition"
              />
              <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
                Balance Akrobatika & Torna Club
              </figcaption>
            </figure>
          </a>
          <figure>
            <img
              src="/images/logo_szpa_hse.png"
              alt="Szent Pál Akadémia – Hit Sportegyesület"
              className="rounded-2xl mx-auto group-hover:scale-110 transition"
            />
            <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
              Szent Pál Akadémia – Hit Sportegyesület
            </figcaption>
          </figure>
          <a href="https://akrobatikustorna.hu/" target="_blank" rel="noopener" className="group">
            <figure>
              <img
                src="/images/logo_base.png"
                alt="Budai Akrobatikus Sport Egyesület"
                className="rounded-2xl mx-auto group-hover:scale-110 transition"
              />
              <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
                Budai Akrobatikus Sport Egyesület
              </figcaption>
            </figure>
          </a>
          <figure>
            <img
              src="/images/logo_tfse.png"
              alt="Testnevelési Egyetem Sportegyesülete"
              className="rounded-2xl mx-auto group-hover:scale-110 transition"
            />
            <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
              Testnevelési Egyetem Sportegyesülete
            </figcaption>
          </figure>
        </div>
      </main>
    </AppLayout>
  );
}
