import { Link } from "@inertiajs/react";
import Autoplay from "embla-carousel-autoplay";
import { LuArrowRight } from "react-icons/lu";
import CarouselImage1 from "@/assets/images/carousel/1c0164f0-13f6-41f9-879f-f84df228dc59.jpg";
import CarouselImage3 from "@/assets/images/carousel/5ebc0a45-5383-41ea-9eb2-6aafd85984c2.jpg";
import CarouselImage4 from "@/assets/images/carousel/78b7c771-5c48-4664-8e37-58755945ea27.jpg";
import CarouselImage2 from "@/assets/images/carousel/00903ad0-2987-4bd1-9227-4ca1995936a6.jpg";
import { Carousel, CarouselContent, CarouselItem } from "@/components/ui/carousel";
import contributors from "@/data/contributors";
import sponsors from "@/data/sponsors";
import PostCard from "@/featuers/posts/post-card";
import PostsWrapper from "@/featuers/posts/posts-wrapper";
import AppLayout from "@/layouts/app-layout";
import type { Post, SharedData } from "@/types";

const CAROUSEL_IMAGES = [CarouselImage1, CarouselImage2, CarouselImage3, CarouselImage4] as const;

export default function Page(props: SharedData<{ posts: Post[] }>) {
  return (
    <AppLayout>
      <main>
        <section className="container my-16">
          <h1 className="text-balance text-center font-bold text-6xl tracking-tighter">
            Viktória Kupa Versenysorozat Akrobatikus Torna
          </h1>
        </section>
        <section className="container ">
          <Carousel className="h-full w-full" opts={{ loop: true }} plugins={[Autoplay({ delay: 5000 })]}>
            <CarouselContent className="h-full">
              {CAROUSEL_IMAGES.map((image, index) => (
                // biome-ignore lint/suspicious/noArrayIndexKey: No unique key for static images
                <CarouselItem key={index} className="h-[33vh] md:h-[50vh]">
                  <img src={image} alt="" className="h-full w-full object-cover object-center" />
                </CarouselItem>
              ))}
            </CarouselContent>
          </Carousel>
        </section>
        <section className="container mt-16">
          <div className="prose prose-lg mx-auto max-w-[80ch]">
            <h2 className="text-center text-balance font-bold text-3xl tracking-tighter sm:text-4xl md:text-5xl">
              Viktória Kupa - Egy versenyrendszer története
            </h2>
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
              hiszen jelentősen nőtt a hivatalosan leigazolt „B” kategóriás versenyzők száma, akik aktívan részt is
              vettek a versenyeken.
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
              Történelmi mérföldkő, hogy a Magyar Torna Szövetség bizalmat szavazott a rendszernek, és 2025-től a
              Viktória Kupa Országos Bajnoki versenyrendszerként is működhet.
            </p>
            <p>
              A Viktória Kupa nem csupán verseny. Egy közösség, egy fejlődési út és egy lehetőség arra, hogy minél
              többen megtapasztalják az akrobatikus torna világát.
            </p>
            <p className="font-bold">Az akrobatikus torna egy életre szól.</p>
          </div>
        </section>
        <section className="container mt-16">
          <div className="prose prose-lg mx-auto max-w-[80ch]">
            <h2 className="text-center font-bold text-3xl tracking-tighter sm:text-4xl md:text-5xl">Mottónk</h2>
            <p>Örülünk, ha az ellenfél, jól felkészült, mert így veszteni nem szégyen, de győzni dicsőség!</p>
          </div>
        </section>
        <section className="container mt-16">
          <div className="prose prose-lg mx-auto max-w-[80ch]">
            <h2 className="text-center font-bold text-3xl tracking-tighter sm:text-4xl md:text-5xl">
              Akrobatikustorna
            </h2>
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
          </div>
        </section>
        {props.posts.length > 0 ? (
          <section className="container mt-16">
            <div className="prose prose-lg mx-auto max-w-none">
              <h2 className="text-center font-bold text-3xl tracking-tighter sm:text-4xl md:text-5xl">
                Aktuális híreink
              </h2>
              <PostsWrapper className="not-prose">
                {props.posts.map((post) => (
                  <PostCard key={post.slug} post={post} loading="lazy" />
                ))}
              </PostsWrapper>

              <Link href="/hirek" className="not-prose mt-8 block text-center text-gray-900 text-xl hover:text-primary">
                Korábbi hírek <LuArrowRight className="inline-block" />
              </Link>
            </div>
          </section>
        ) : null}
        <section className="container my-16">
          <h2 className="text-center font-bold text-3xl tracking-tighter sm:text-4xl md:text-5xl">Támogatóink</h2>
          <div className="flex gap-8 justify-center mt-16">
            {sponsors.map((sponsor) => (
              <a
                href={sponsor.href}
                key={sponsor.href}
                target="_blank"
                rel="noreferrer"
                className="group inline-flex flex-col items-center space-y-2 text-center"
              >
                <img
                  className="col-span-2 mx-auto h-32 w-fit rounded object-contain lg:col-span-1"
                  src={sponsor.image}
                  alt={sponsor.name}
                  title={sponsor.name}
                  width={158}
                  height={48}
                />
                <span className="group-hover:text-primary group-hover:underline">{sponsor.name}</span>
              </a>
            ))}
          </div>
        </section>
        <section className="container my-16">
          <h2 className="text-center font-bold text-3xl tracking-tighter sm:text-4xl md:text-5xl">
            Együttműködő partnereink
          </h2>
          <div className="flex gap-8 justify-center mt-16">
            {contributors.map((contributor) => (
              <a
                href={contributor.href}
                key={contributor.href}
                target="_blank"
                rel="noreferrer"
                className="group inline-flex flex-col items-center space-y-2 text-center"
              >
                <img
                  className="col-span-2 mx-auto h-32 w-fit rounded object-contain lg:col-span-1"
                  src={contributor.image}
                  alt={contributor.name}
                  title={contributor.name}
                  width={158}
                  height={48}
                />
                <span className="group-hover:text-primary group-hover:underline">{contributor.name}</span>
              </a>
            ))}
          </div>
        </section>
      </main>
    </AppLayout>
  );
}
