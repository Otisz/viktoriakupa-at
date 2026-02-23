import { Head } from "@inertiajs/react";
import AppLayout from "@/layouts/app-layout";
import type { Page as PageType, SharedData } from "@/types";

export default function Page(props: SharedData<{ calendar: PageType }>) {
  return (
    <AppLayout>
      <Head title={props.calendar.title.hu}>
        <meta
          head-key="description"
          name="description"
          content={props.calendar.description?.hu ?? props.calendar.title.hu}
        />
      </Head>
      <main className="container py-12">
        <section className="prose max-w-full">
          <h1>{props.calendar.title.hu}</h1>
          {/** biome-ignore lint/security/noDangerouslySetInnerHtml: The content comes from trusted users */}
          <div dangerouslySetInnerHTML={{ __html: props.calendar.content.hu }} />
        </section>
      </main>
    </AppLayout>
  );
}
