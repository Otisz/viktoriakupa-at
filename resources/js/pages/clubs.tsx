import { Head } from "@inertiajs/react";
import AppLayout from "@/layouts/app-layout";
import type { Club, SharedData } from "@/types";

export default function Page(props: SharedData<{ clubs: Club[] }>) {
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
        <div className="container grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          {props.clubs.map((club) => {
            const clubNode = (
              <figure key={club.id}>
                <img
                  src={club.image_url}
                  alt={club.name}
                  className="rounded-2xl mx-auto group-hover:scale-110 transition h-48 w-auto"
                  width={600}
                  height={600}
                />
                <figcaption className="text-center text-balance text-muted-foreground italic text-sm">
                  {club.name}
                </figcaption>
              </figure>
            );

            if (club.url) {
              return (
                <a href={club.url} target="_blank" rel="noopener" className="group" key={club.id}>
                  {clubNode}
                </a>
              );
            }

            return clubNode;
          })}
        </div>
      </main>
    </AppLayout>
  );
}
