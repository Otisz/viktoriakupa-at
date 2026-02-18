import { Link } from "@inertiajs/react";
import DesktopMenu from "@/components/navbar/desktop-menu";
import MobileMenu from "@/components/navbar/mobile-menu";

export default function Navbar() {
  return (
    <nav className="h-24 bg-secondary text-secondary-foreground">
      <div className="container flex h-full items-center justify-between">
        <Link href="/" className="inline-flex items-center gap-2">
          <img src="/images/logo_vk.png" alt="Viktoria Kupa logo" className="h-26 w-auto" />
          <span className="font-bold text-3xl text-primary-foreground tracking-wider">Viktoria Kupa</span>
        </Link>
        <DesktopMenu />
        <MobileMenu />
      </div>
    </nav>
  );
}
