import { Link } from "@inertiajs/react";
import type { ComponentPropsWithoutRef } from "react";
import type { IconType } from "react-icons";
import {
  NavigationMenu,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
  navigationMenuTriggerStyle,
} from "@/components/ui/navigation-menu";
import LINKS from "@/data/links";

export default function DesktopMenu() {
  return (
    <NavigationMenu className="hidden lg:flex">
      <NavigationMenuList>
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
          <NavigationMenuLink className={navigationMenuTriggerStyle()} asChild>
            <Link href={LINKS.rules}>Szabályzatok</Link>
          </NavigationMenuLink>
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
      </NavigationMenuList>
    </NavigationMenu>
  );
}

function ListItem({
  title,
  children,
  href,
  icon: Icon,
  ...props
}: ComponentPropsWithoutRef<"li"> & { href: string; icon: IconType }) {
  return (
    <li {...props}>
      <NavigationMenuLink asChild>
        <Link
          className="flex h-full gap-4 items-center select-none rounded-md border border-border from-muted/50 to-muted px-4 py-2 outline-hidden transition-all hover:border-transparent hover:bg-linear-to-b focus:shadow-md"
          href={href}
        >
          <Icon className="size-12 stroke-muted-foreground" />
          <div className="flex flex-col gap-1">
            <p className="font-medium text-lg">{title}</p>
            <p className="text-balance text-muted-foreground leading-tight">{children}</p>
          </div>
        </Link>
      </NavigationMenuLink>
    </li>
  );
}
