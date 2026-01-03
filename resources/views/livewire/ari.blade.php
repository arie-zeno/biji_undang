@section('head')
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        .cursive-font {
            font-family: 'Dancing Script', cursive;
    </style>
    @endsection
<div
    x-data="invitation()"
    x-init="init()"
    :class="!opened ? 'overflow-hidden h-screen' : ''"
    class="relative w-full"
>

    <!-- AUDIO -->
    <audio wire:ignore id="bg-music" loop>
        <source src="{{ asset('musik/love_story.mp3') }}" type="audio/mpeg">
    </audio>

    <!-- COVER -->
    <section
        class="h-screen flex flex-col items-center justify-center text-center bg-[#f7f3ef]
               transition-transform duration-2000 ease-out"
        :class="intro ? 'scale-100' : 'scale-[10]'"
    >
        <h2 class="text-lg mb-2">The Wedding Of</h2>
        <h1 class="text-3xl font-bold cursive-font mb-4">Ari & Thari</h1>
        <h4>Dear :</h4>
        <h6>{{$undangan ?? "Saudara(i)"}} & Partner</h6>

        <button
            class="mt-6 px-6 py-3 bg-black text-white rounded-lg"
            @click="openInvitation"
        >
            Buka Undangan
        </button>
    </section>

    <!-- CONTENT -->
    <section
        x-ref="content"
        class="min-h-screen bg-white p-10"
    >
        <h1 class="text-3xl font-bold">Ari & Thari</h1>
        <p class="mt-4">
            Kami mengundang Bapak/Ibu/Saudara/i untuk hadir pada acara pernikahan kami.
        </p>
    </section>

</div>
<script>
    function invitation() {
        return {
            intro: false,   // khusus animasi zoom-out
            opened: false,  // khusus buka undangan

            init() {
                // trigger animasi zoom-out saat load
                setTimeout(() => {
                    this.intro = true;
                }, 50);
            },

            openInvitation() {
                this.opened = true;

                // play music
                const music = document.getElementById('bg-music');
                if (music) music.play();

                // scroll ke konten
                this.$nextTick(() => {
                    this.$refs.content.scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            }
        }
    }
</script>
