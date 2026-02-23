import { LuPhone } from "react-icons/lu";
import { SiFacebook } from "react-icons/si";
import { Button, buttonVariants } from "@/components/ui/button";
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuGroup,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
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
          <DropdownMenu>
            <DropdownMenuTrigger asChild>
              <Button variant="secondary" size="sm">
                Nevezés
              </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align="end">
              <DropdownMenuGroup>
                <DropdownMenuItem asChild>
                  <a
                    href={LINKS.apply}
                    aria-label="Tovább a jelentkezés oldalra (új lap)"
                    title="Jelentkezés Google Forms-on keresztül"
                  >
                    Ideiglenes nevezés
                  </a>
                </DropdownMenuItem>
                <DropdownMenuItem disabled>Végleges nevezés (Hamarosan)</DropdownMenuItem>
              </DropdownMenuGroup>
            </DropdownMenuContent>
          </DropdownMenu>

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
