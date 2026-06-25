import { Link, usePage } from "@inertiajs/react";
import { buttonVariants } from "@/components/ui/button";
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuGroup,
  DropdownMenuItem,
  DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import {
  NavigationMenu,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
  NavigationMenuTrigger,
  navigationMenuTriggerStyle,
} from "@/components/ui/navigation-menu";
import LINKS from "@/data/links";
import { cn } from "@/lib/utils";
import type { SharedData } from "@/types";

export default function DesktopMenu() {
  const page = usePage();

  return (
    <NavigationMenu className="hidden lg:flex">
      <NavigationMenuList>
        <NavigationMenuItem>
          <NavigationMenuLink className={navigationMenuTriggerStyle()} asChild>
            <Link href={LINKS.news}>Hírek</Link>
          </NavigationMenuLink>
        </NavigationMenuItem>
        <NavigationMenuItem>
          <NavigationMenuLink className={navigationMenuTriggerStyle()} asChild>
            <Link href={LINKS.about_us}>Rólunk</Link>
          </NavigationMenuLink>
        </NavigationMenuItem>
        <NavigationMenuItem>
          <NavigationMenuLink className={navigationMenuTriggerStyle()} asChild>
            <Link href={LINKS.clubs}>Egyesületek</Link>
          </NavigationMenuLink>
        </NavigationMenuItem>
        <NavigationMenuItem>
          <DropdownMenu>
            <DropdownMenuTrigger asChild>
              <NavigationMenuTrigger>Dokumentumok</NavigationMenuTrigger>
            </DropdownMenuTrigger>
            <DropdownMenuContent>
              <DropdownMenuGroup>
                {Object.entries((page.props as unknown as SharedData).documentTypes).map(([slug, title]) => (
                  <DropdownMenuItem key={slug} asChild>
                    <Link href={`/dokumentumok/${slug}`}>{title}</Link>
                  </DropdownMenuItem>
                ))}
              </DropdownMenuGroup>
            </DropdownMenuContent>
          </DropdownMenu>
        </NavigationMenuItem>
        <NavigationMenuItem>
          <NavigationMenuLink className={navigationMenuTriggerStyle()} asChild>
            <Link href={LINKS.calendar}>Versenynaptár</Link>
          </NavigationMenuLink>
        </NavigationMenuItem>
        <NavigationMenuItem>
          <NavigationMenuLink className={navigationMenuTriggerStyle()} asChild>
            <Link href={LINKS.contact}>Kapcsolat</Link>
          </NavigationMenuLink>
        </NavigationMenuItem>
        <NavigationMenuItem>
          <DropdownMenu>
            <DropdownMenuTrigger asChild>
              <NavigationMenuTrigger className={cn(buttonVariants(), "hover:text-primary-foreground")}>
                Nevezés
              </NavigationMenuTrigger>
            </DropdownMenuTrigger>
            <DropdownMenuContent>
              <DropdownMenuGroup>
                <DropdownMenuItem asChild>
                  <a
                    href={LINKS.apply_temp}
                    aria-label="Tovább az ideiglenes jelentkezés oldalra (új lap)"
                    title="Ideiglenes jelentkezés Google Forms-on keresztül"
                  >
                    Ideiglenes nevezés
                  </a>
                </DropdownMenuItem>
                <DropdownMenuItem asChild>
                  <a
                    href={LINKS.apply_perma}
                    aria-label="Tovább a végleges jelentkezés oldalra (új lap)"
                    title="Végleges jelentkezés Google Forms-on keresztül"
                  >
                    Végleges nevezés
                  </a>
                </DropdownMenuItem>
              </DropdownMenuGroup>
            </DropdownMenuContent>
          </DropdownMenu>
        </NavigationMenuItem>
      </NavigationMenuList>
    </NavigationMenu>
  );
}
