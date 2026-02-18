import { Head } from "@inertiajs/react";
import type { ReactNode } from "react";
import Footer from "@/components/footer";
import Header from "@/components/header";
import Navbar from "@/components/navbar";

export default function AppLayout({ children }: { children: ReactNode }) {
  return (
    <>
      <Head>
        <meta head-key="description" name="description" content="Viktoria Kupa" />
        <meta property="og:title" content="Viktoria Kupa" />
        <meta property="og:description" content="Viktoria Kupa" />
        <meta property="og:image" content="https://viktoriakupa.hu/logo_vk.png" />
        <meta property="og:type" content="website" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Viktoria Kupa" />
        <meta name="twitter:description" content="Viktoria Kupa" />
        <meta name="twitter:image" content="https://viktoriakupa.hu/logo_vk.png" />
      </Head>
      <div className="min-h-[calc(100dvh---spacing(38))]">
        <Header />
        <Navbar />
        {children}
        <Footer />
      </div>
    </>
  );
}
