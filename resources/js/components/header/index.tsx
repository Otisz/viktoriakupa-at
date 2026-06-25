import { Link } from "@inertiajs/react";

export default function Header() {
  return (
    <header className="py-4 bg-primary text-primary-foreground">
      <div className="container flex h-full items-center justify-center">
        <Link href="/" className="flex lg:flex-row items-center gap-2 flex-wrap justify-center">
          <img
            src="/images/logo_matsz.png"
            alt="Magyar Akrobatikus Torna Szakág logo"
            className="h-26 w-auto order-1"
          />
          <div className="flex flex-col gap-2 items-center justify-center text-primary-foreground tracking-wider text-center text-balance order-3 lg:order-2">
            <p className="font-semibold text-xl">Magyar Torna Szövetség</p>
            <p className="font-semibold text-2xl">Akrobatikus Torna Szakág</p>
            <p className="font-bold text-3xl">Viktoria Kupa Versenysorozat</p>
          </div>
          <img src="/images/logo_vk.png" alt="Viktoria Kupa logo" className="h-26 w-auto order-2 lg:order-3" />
        </Link>
      </div>
    </header>
  );
}
