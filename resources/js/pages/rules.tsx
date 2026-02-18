import { Head } from "@inertiajs/react";
import AppLayout from "@/layouts/app-layout";

export default function Page() {
  return (
    <AppLayout>
      <Head title="Szabályzatok"></Head>
      <main className="container max-w-[80ch] py-20 prose prose-a:text-secondary"></main>
    </AppLayout>
  );
}
