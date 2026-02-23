import { Link } from "@inertiajs/react";
import { LuPhone } from "react-icons/lu";
import { SiFacebook } from "react-icons/si";
import { buttonVariants } from "@/components/ui/button";
import LINKS from "@/data/links";

export default function Header() {
  return (
    <header className="h-14 bg-primary text-primary-foreground">
      <div className="container flex h-full items-center justify-between gap-4">
        <a
          href="tel:+36 20 311 1919"
          aria-label="Hívjon minket a +36 20 311 1919 telefonszámon"
          className="inline-flex items-center gap-x-2 text-xl hover:underline hover:underline-offset-2"
          title="Hívjon minket a +36 20 311 1919 telefonszámon"
        >
          <LuPhone />
          <span>+36 20 311 1919</span>
        </a>
        <div className="flex items-center gap-x-8">
          <Link
            href={LINKS.home}
            className={buttonVariants({ variant: "secondary", size: "sm" })}
            aria-label="Tovább a jelentkezés oldalra (új lap)"
            title="Jelentkezés Google Forms-on keresztül"
          >
            Jelentkezés
          </Link>
          <a
            href={LINKS.facebook}
            target="_blank"
            aria-label="Tekintse meg a Facebook oldalunkat"
            className="group"
            title="Facebook"
            rel="noreferrer"
          >
            <SiFacebook className="size-8 group-hover:fill-[#4267b2]" />
          </a>
        </div>
      </div>
    </header>
  );
}
