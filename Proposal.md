# Digitally Editing a Section From Heinrich Glarean’s *Dodekachordon* – Aim, Methods, Road Map

Heinrich Glarean’s massive tome of music theory, the *Dodekachordon*, is one of the central texts on music in the 16. ct., if not the entire Renaissance.
It offers a rich insight into the ways humanist thinkers conceived of music, its perceived history, and the way it ought to be written and performed.
Over three volumes, it covers vast musical grounds, progressing in a plethora of musical examples – some commissioned especially for the book – from plainsong to intricate polyphony.

Despite its fame, to my knowledge, there is as of today no digitally available edition of the *Dodekachordon* that harnesses the full potential of the web as a place for publication.
Several of the printed originals can be read online by courtesy the responsible libraries (i. e. the [Bayerische Staatsbibliothek](https://opacplus.bsb-muenchen.de/title/BV001491961) or [Gallica](https://gallica.bnf.fr/ark:/12148/bpt6k1280486r)). The Latin text is [digitally available](https://chmtl.indiana.edu/tml/16th/GLADOD1_TEXT.html) as part of the *Thesaurus Musicarum Latinarum*, hosted by the University of Indiana, with the musical examples included as pictures.
An English translation and edition from 1965 by Clement A. Miller exists but is sadly not  freely available online, I suspect due to copyright reasons (the text was published by the American Institute of Musicology, in the book Armen Carapetyan is credited with the copyright).
While all of these resources are valuable in making the text accessible for scholars, performers, and the general public, none of them incorporate what I would describe as the fundamental strengths of a digital presentation (Miller’s edition was, of course, never conceived as a digital edition, and the focus of both a library e-reader and the *Thesaurus* are on collection and presentation of as many resources as possible rather than creating a sophisticated reading experience, so this is in no way meant as a criticism of these efforts).

## Digitally Presenting Musical Theory

So what do I mean when I write about the supposed “strengths of digital presentation”? I argue that texts that engage with music, such as the writings of musical theorists, are in a unique position to profit from the possibilities of digital publishing.
These texts are mainly composed of text, a format that is easily encodable and reproducible in a digital form.
Additionally, they engage with music, a form of expression that is chronically lacking in text form.
Where a printed version would, in the best of cases, include a CD, a digital edition can immediately supply music in both visual and audio form.
A musical example can not only be studied as a score, but also listened to, either via a linked performance, or in the form of digitally generated MIDI-sound.
Further material, such as images, can be supplied freely, in highest resolution and zoomable.
In the case of so-called “Early Music”, the advantages are even more evident: Rather than having to settle for either original notation, which are inhibitive towards both layman readers and many performers, or modern notation, which is always in danger of sacrificing the original subtlety, a digital presentation of the notation can have its cake and eat it too, giving the reader the ability to switch between original and modern, just as they please (given that the edition can afford both versions, as – as far as I am aware – we cannot yet rely on the accurate conversion from mensural to modern notation and the other way around is completely impossible due to such elements as ligatures which cannot be guessed by any converter. Thankfully, the MEI standard provides a great way of handling such editorial intricacies as varying sources). 

In addition to these musical benefices of digital presentation, a text concerned with musical theory, such as Glarean’s *Dodekachordon*, is particularly interesting for one further reason: In its effort to describe musical processes, it has to define and explain various musical phenomena.
By marking up these phenomena, they can be made accessible from without the text – they can be indexed and linked against other texts or resources.
If, for example, (a hypothetical digital edition of) Zarlino describes something akin to Glarean, we do not have to rely on them using the same exact words to describe it.
Rather, by marking them and linking them against each other, creating, in a sense an extensible footnote apparatus, they can be made to communicate with each other without having to agree in their terminology.
Similarly, if another scholarly project, such as the CRIM-Project were to describe a concept that is related to something marked up in an edition of Glarean, or Zarlino, these connections could be made discoverable without them having to agree on the minutiae which would be necessary if both of their text were treated as simple strings by machines.
Rather, observations could be grouped into semantic clouds that describe close or distant relations, leaving it to the discerning reader to figure out how much they want to make of the connection.
This principle is not confined to text: Music that is encoded according to scholarly standards, that is to say according to MEI specifications, can also be cross-referenced and quoted, thanks to the [Enhancing Music Notation Addressability (EMA) API](https://archive.mith.umd.edu/mith-2020/research/enhancing-music-notation-addressability/index.html).
Of course, such abilities make visible the various connections and relationships between musical texts and sources are tremendously valuable for scholarly introspection, and particularly so in a text that is concerned with musical history and theory.

## All Fine and Dandy, But How Go About It?

The above outlines my foundational argument: That the edition of historical sources where both music and language contribute to the fabric of the text in a digital fashion is uniquely profitable, by both making the text more accessible to more readers, both by the nature of web-based (free and open source) publishing and by eliminating barriers of entry and by facilitating scholarly inquiry.
But what are the technologies that would facilitate such a presentation?
Text in itself is arguably the easiest thing to transmit over the web – it’s what it was designed to do.
It can be made nice to look at with the help of CSS and interactions can be handled with JavaScript.
You could, for example, be able to choose from either the Latin original, a number of translations, or read them side by side in any constellation.
You should be able to access an editorial apparatus that includes textual variants, highlighting of editorial corrections, footnotes and literature.
Finally, the text should be exportable to different formats, such as PDF, TEI-compliant markup, or plain text.
The musical examples should be encoded according to MEI specifications and rendered dynamically.
This can be achieved by the rendering engine [Verovio](https://www.verovio.org), which renders the XML as an SVG image, which can then in turn be styled with CSS.
In addition, Verovio facilitates the creation of sound output.
Ideally, the reader would thus be able to choose between original and modern notation, just as they would be able to choose between the original text and a translation, and they could listen to every musical example with the help of audio controls.

## So What Is There To Do?

The entire project was devised by me, for me, to get me to learn as much about digital publishing in a musicological context as possible.
To work towards that goal, I will attempt to do as much of it by myself as possible.
As things stand now, I have a passable knowledge of HTML and CSS, and I can display musical notation with Verovio.
The big unknown remains JavaScript, which will, however, be instrumental in achieving the goals detailed above.
To keep the workload manageable, I will start out with 1 or 2 of Glarean’s short chapters from the third volume of the *Dodekachordon* (as that contains the most interesting music examples).
If I get such a small sample running, I will count myself lucky and assume that I would be able to add further chapters in a similar manner.
Thankfully, I can use the Latin text provided by the *Thesaurus Musicarum Latinarum*.
Unfortunately, I guess I will not be able to use Miller’s English translation as I assume that would break copyright law.
However, it should help me in getting a passable German translation that should suffice for emulating the feeling of being able to choose and compare between various languages.
In terms of music, I have some snippets at hand that I use for testing Verovio features and will transcribe whatever is necessary, whenever the need arises (via the pipeline MuseScore -> MusicXML -> MEI) The road map for me in the coming weeks and months will look as follows:

### Technical

1. Decide on a data structure for my files – how does the backend look? Is there a database involved? How will the fundamental markup look like? Can I get it going on the UR Servers or should I look into other hosting options?
2. Decide on, and learn, JavaScript options – what technologies, frameworks, libraries, would be appropriate / best suited for the job?

3. Learn the intricacies of Verovio and the Rendering process, as well as the EMA
4. Put everything together and hope that it holds
5. Make it humanly palatable with CSS and the likes

### Scholarly

1. Decide on the sources to consider: Are there considerable variants? Is there an authoritative source, varying editions, etc? Decide on a chain of command when in doubt between the sources considered
2. Decide on the passage to use for this experiment (chapters 23-24?)
3. Transcribe / correct the Music and Text
4. Decide on a markup scheme
5. Research the things to be marked up
6. Write footnotes to explain editorial decisions
7. Write an Introduction that explains the aim and scope – so, this text, essentially.
