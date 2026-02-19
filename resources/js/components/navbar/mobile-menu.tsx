/** biome-ignore-all lint/correctness/useUniqueElementIds: <explanation> */

import { Link } from "@inertiajs/react";
import { VisuallyHidden } from "@radix-ui/react-visually-hidden";
import { FaAlignRight, FaRegCircleXmark } from "react-icons/fa6";
import { SiFacebook } from "react-icons/si";
import {
  Sheet,
  SheetClose,
  SheetContent,
  SheetDescription,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from "@/components/ui/sheet";
import LINKS from "@/data/links";

export default function MobileMenu() {
  return (
    <Sheet>
      <SheetTrigger aria-label="Navigációs menü megnyitása" className="block lg:hidden">
        <FaAlignRight className="h-8 w-8" />
      </SheetTrigger>
      <SheetContent noClose className="w-full border-none bg-background p-0">
        <SheetHeader className="m-4 flex h-20 flex-row divide-x divide-background">
          <SheetTitle className="flex flex-1 items-center px-4 font-bold text-2xl">Menü</SheetTitle>
          <SheetClose
            className="m-0! inline-flex aspect-square h-full items-center justify-center rounded-xl border-2 border-border bg-accent/30 transition-all hover:border-orange-500 hover:bg-accent"
            aria-labelledby="close-navitaion-menu"
          >
            <FaRegCircleXmark className="h-8 w-8" />
            <span className="sr-only" id="close-navitaion-menu">
              Navigációs menü bezárása
            </span>
          </SheetClose>
          <VisuallyHidden asChild>
            <SheetDescription className="hidden">Navigációs menü</SheetDescription>
          </VisuallyHidden>
        </SheetHeader>
        <div className="h-full space-y-8 overflow-auto pb-32">
          <div className="grid grid-cols-1 divide-y divide-border">
            <SheetClose asChild>
              <Link href={LINKS.about_us} className="px-8 py-4">
                Rólunk
              </Link>
            </SheetClose>
            <SheetClose asChild>
              <Link href={LINKS.clubs} className="px-8 py-4">
                Egyesületek
              </Link>
            </SheetClose>
            <SheetClose asChild>
              <Link href={LINKS.rules} className="px-8 py-4">
                Szabályzatok
              </Link>
            </SheetClose>
            <SheetClose asChild>
              <Link href={LINKS.calendar} className="px-8 py-4">
                Versenynaptár
              </Link>
            </SheetClose>
            <SheetClose asChild>
              <Link href={LINKS.contact} className="px-8 py-4" aria-label="Ugrás a kapcsolat oldalra">
                Kapcsolat
              </Link>
            </SheetClose>
          </div>
          <div className="grid grid-cols-1 gap-4 px-8">
            <a
              href={LINKS.facebook}
              target="_blank"
              aria-label="Tekintse meg a Facebook oldalunkat"
              title="Facebook"
              rel="noreferrer"
            >
              <SiFacebook className="mx-auto size-12 fill-[#4267b2]" />
            </a>
          </div>
        </div>
      </SheetContent>
    </Sheet>
  );
}
