<?php
    include "src/components/header.php";
?>


<!-- Hero Section -->
<section class="bg-[#0D0D0D] text-center py-20 px-4">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl md:text-6xl font-bold text-[#FFD700] mb-6">
      Real. Fair. And Professional.
    </h1>

    <p class="text-lg text-[#CCCCCC] mb-12 px-4">
      China Bully Registry – your trusted source for pedigree certification and international breed standards.
    </p>

    <!-- Search Form -->
    <form id="searchForm" class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-8">
      <input 
        type="text" 
        id="searchInput"
        placeholder="Search by Name or Chip Number" 
        class="w-full sm:w-80 px-4 py-3 rounded-md bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
      />
      <button 
        type="submit" 
        class="px-6 py-3 rounded-md bg-white/20 text-white font-medium hover:bg-white/30 transition-colors">
        Search
      </button>
    </form>

   <!-- Results Container -->
    <div id="searchResult" class="hidden grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-5xl mx-auto">
    <!-- Dynamic results appear here -->
    </div>

  </div>
</section>




  <!-- Features Section -->
  <section class="py-16 px-6 bg-[#1A1A1A]">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-[#2B2B2B] p-6 rounded-xl text-center border border-[#333]">
        <h3 class="text-xl font-semibold text-[#FFD700] mb-2">Verified Pedigrees</h3>
        <p class="text-[#CCCCCC]">Certified and authenticated dog lineage by professionals.</p>
      </div>
      <div class="bg-[#2B2B2B] p-6 rounded-xl text-center border border-[#333]">
        <h3 class="text-xl font-semibold text-[#FFD700] mb-2">Global Recognition</h3>
        <p class="text-[#CCCCCC]">Standards that meet international canine registries.</p>
      </div>
      <div class="bg-[#2B2B2B] p-6 rounded-xl text-center border border-[#333]">
        <h3 class="text-xl font-semibold text-[#FFD700] mb-2">Online Search</h3>
        <p class="text-[#CCCCCC]">Easily search dogs by name or chip number in our system.</p>
      </div>
    </div>
  </section>


<!-- Breeds Section -->
 <section class="py-20 px-6">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-center text-3xl md:text-4xl font-bold text-[#FFD700] mb-12 uppercase">Breeds</h2>

      <!-- Breed Items -->
      <div class="space-y-20">
        
        <!-- Breed 1 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <img src="static/assets/bullies/american_bullies.webp" alt="American Bully" class="w-full rounded-lg shadow-lg"/>
          <div>
            <h3 class="text-2xl font-semibold mb-2">AMERICAN BULLY</h3>
            <p class="text-[#CCCCCC] mb-4">
              TThe American Bully should give the impression of great strength for its size. It is a compact and medium/large size dog with a muscular body and blocky head. The American Bully should have the appearance of heavy bone structure with a bulky build look.

                IN BRC GLOBAL THE AMERICAN BULLY SHOWS IN 4 VARIETIES:

                POCKET, EXTREME, CLASSIC AND STANDARD

                The American Bully is a companion breed exhibiting confidence, a zest for life, along with an exuberant willingness to please and bond with their family, thus making the American Bully an excellent family companion. Despite the American Bully’s fierce and powerful appearance their demeanor is gentle. They are great with kids, and extremely friendly with strangers, other dogs, and other animals.
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

        <!-- Breed 2 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <div class="md:order-2">
            <img src="static/assets/bullies/exotic_bullies.webp" alt="Exotic Bully" class="w-full rounded-lg shadow-lg"/>
          </div>
          <div class="md:order-1">
            <h3 class="text-2xl font-semibold mb-2">EXOTIC BULLY</h3>
            <p class="text-[#CCCCCC] mb-4">
              The Exotic Bully is a compact, medium sized dog with a smooth, short coat. It's tight skin is stretched over a substantially dense muscular body on a heavy boned frame. Distinguishing features are its wide chest, clearly defined, muscular shoulders and rear, blocky head, pronounced cheeks and deep intentions under eyes. It's intense expression and bulky, muscular build give the Exotic Bully a very powerful and strong appearance . This breed is docile in temperament, gentle with children, other dogs and small animals. It bonds strongly with its leader, making the Exotic Bully an excellent family companion.
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

        <!-- Breed 3 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <img src="static/assets/bullies/x_bullies.webp" alt="XL Bully" class="w-full rounded-lg shadow-lg"/>
          <div>
            <h3 class="text-2xl font-semibold mb-2">XL BULLY</h3>
            <p class="text-[#CCCCCC] mb-4">
              The XL BULLY is an American bully that is over 19" if female and over 20" if male.

                We are excited to have separated the XL from the pocket and standard American Bully classes.  We have an XL BULLY standard in the works, as we feel these dogs carry a different breed type  and genetic makeup than the pocket and standard varieties, as the standard will reflect.  Stay tuned for more info on this breed.
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

        <!-- Breed 4 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <div class="md:order-2">
            <img src="static/assets/bullies/french.webp" alt="French Bulldog" class="w-full rounded-lg shadow-lg"/>
          </div>
          <div class="md:order-1">
            <h3 class="text-2xl font-semibold mb-2">FRENCH BULLDOG</h3>
            <p class="text-[#CCCCCC] mb-4">
              The French Bulldog resembles a bulldog in miniature, except for the large, erect “bat ears” that are the breed’s trademark feature. The head is large and square, with heavy wrinkles rolled above the extremely short nose. The body beneath the smooth, brilliant coat is compact and muscular.

                The bright, affectionate Frenchie is a charmer. Dogs of few words, Frenchies don’t bark much—but their alertness makes them excellent watchdogs. They happily adapt to life with singles, couples, or families, and do not require a lot of outdoor exercise. They get on well with other animals and enjoy making new friends of the human variety. 
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

        <!-- Breed 5 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <img src="static/assets/bullies/english.webp" alt="English Bulldog" class="w-full rounded-lg shadow-lg"/>
          <div>
            <h3 class="text-2xl font-semibold mb-2">ENGLISH BULLDOG</h3>
            <p class="text-[#CCCCCC] mb-4">
             You can’t mistake a Bulldog for any other breed. The loose skin of the head, furrowed brow, pushed-in nose, small ears, undershot jaw with hanging chops on either side, and the distinctive rolling gait all practically scream “I’m a Bulldog!” The coat, seen in a variety of colors and patterns, is short, smooth, and glossy. Bulldogs can weigh up to 50 pounds, but that won’t stop them from curling up in your lap, or at least trying to. But don’t mistake their easygoing ways for laziness—Bulldogs enjoy brisk walks and need regular moderate exercise, along with a careful diet, to stay trim. Summer afternoons are best spent in an air-conditioned room as a Bulldog’s short snout can cause labored breathing in hot and humid weather.
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

        <!-- Breed 6 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <div class="md:order-2">
            <img src="static/assets/bullies/shorty.webp" alt="Shorty Bulldog" class="w-full rounded-lg shadow-lg"/>
          </div>
          <div class="md:order-1">
            <h3 class="text-2xl font-semibold mb-2">SHORTYBULL</h3>
            <p class="text-[#CCCCCC] mb-4">
             Shorty Bulls are compact and muscular dogs of small stature. They are athletically inclined and incredibly agile. Shorty Bulls have a strong desire to please, are very intelligent with a good natured attitude. They are bred to be family companions and easily adapt to various lifestyles. Grooming is minimal. Shorty Bulls should have an outgoing personality and never be shy or aggressive.
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

        <!-- Breed 7 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <img src="static/assets/bullies/old_english.webp" alt="OLDE ENGLISH BULLDOGGE" class="w-full rounded-lg shadow-lg"/>
          <div>
            <h3 class="text-2xl font-semibold mb-2">OLDE ENGLISH BULLDOGGE</h3>
            <p class="text-[#CCCCCC] mb-4">
             General Description :  The ideal Olde English Bulldogge is a loyal, courageous dog of medium size with a large powerful head and stout muscular body.  Olde English Bulldogges are athletic and most importantly of very good health, males are free breeders and females are free whelpers.  The Olde English Bulldogge is devoid of all breathing issues and is capable of enjoying outdoor activity without concern except in extreme heat or cold.  The temperament is very stable and trustworthy making them a loyal companion, capable protector and the ultimate family member.  Olde English Bulldogges thrive on pleasing their owners and are very trainable.  
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

        <!-- Breed 8 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <div class="md:order-2">
            <img src="static/assets/bullies/americal_pitbull_tarrier.webp" alt="American Pit Bull Terrier" class="w-full rounded-lg shadow-lg"/>
          </div>
          <div class="md:order-1">
            <h3 class="text-2xl font-semibold mb-2">AMERICAN PIT BULL TERRIER</h3>
            <p class="text-[#CCCCCC] mb-4">
              Sometime during the nineteenth century, dog fanciers in England, Ireland and Scotland began to experiment with crosses between Bulldogs and Terriers, looking for a dog that combined the gameness of the terrier with the strength and athleticism of the Bulldog. The result was a dog that embodied all of the virtues attributed to great warriors: strength, indomitable courage, and gentleness with loved ones. Immigrants brought these bull-and-terrier crosses to the United States. The American Pit Bull Terrier’s many talents did not go unnoticed by farmers and ranchers who used their APBTs as catch dogs for semi-wild cattle and hogs, to hunt, to drive livestock, and as family companions. 
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

        <!-- Breed 9 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <img src="static/assets/bullies/american_bulldog.webp" alt="American Bulldog" class="w-full rounded-lg shadow-lg"/>
          <div>
            <h3 class="text-2xl font-semibold mb-2">AMERICAN BULLDOG</h3>
            <p class="text-[#CCCCCC] mb-4">
              The American Bulldog is a descendant of the English Bulldog. It is believed that the bulldog was in America as early as the 17th century. They came to the United States in the 1800s, with immigrants who brought their working bulldogs with them. Small farmers and ranchers used this all-around working dog for many tasks including farm guardians, stock dogs, and catch dogs. The breed largely survived, particularly in the southern states, due to its ability to bring down and catch feral pigs.

                The breed we know as the American Bulldog was originally known by many different names before the name American Bulldog became the standard. In different parts of the South he was known as the White English Southern Bulldog, but most commonly just “bulldog.” The breed was not called a bulldog because of a certain look, but because they did real bulldog work.
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

        <!-- Breed 10 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <div class="md:order-2">
            <img src="static/assets/bullies/chinese_chongqing.webp" alt="Chinese Chongqing" class="w-full rounded-lg shadow-lg"/>
          </div>
          <div class="md:order-1">
            <h3 class="text-2xl font-semibold mb-2">CHINESE CHONGQING</h3>
            <p class="text-[#CCCCCC] mb-4">
              The history of this breed can be traced back to Western Han Dynasty (BC 202- AD 8), more than 2,000 years ago. Archaeologists found a huge Western Han Dynasty’s graveyyard in Jiangbei area of Chongqing on 20th April, 2000. A large number of dog pottery statues of their kind were found. Some of them served the purpose of being protector Gods to accompany the tomb of the noble family in spirit. This ancient breed was prevalent in Chongqing. It’s direct ancestor is the native breeds from the adjacent regions of Dazhu, Hechuan, Yongchuan, Lingshui and Guanan and collectively called as Chongqing Dog. They were developed for hunting in the mountain area of East Sichuan. Chongqing Dog lost their major purpose due to the urbanisation and their population declined rapidly. The restoration of the breed was undertaken successfully not until 70’s. They become a popular utility dog in Chongqing since then.
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

        <!-- Breed 11 -->
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <img src="static/assets/bullies/bull_terrier.webp" alt="Bull Terrier" class="w-full rounded-lg shadow-lg"/>
          <div>
            <h3 class="text-2xl font-semibold mb-2">BULL TERRIER</h3>
            <p class="text-[#CCCCCC] mb-4">
              Bull Terriers are robust, big-boned terriers who move with a jaunty stride suggesting agility and power. The breed’s hallmark is a long, egg-shaped head with erect and pointed ears, and small, triangular eyes that glisten with good humor. Coats come in two types: white; and any other color (including an attractive brindle striping), either solid or with white markings. A well-made BT is the picture of muscular determination and balance. There are four keys to BT happiness: early socialization with dogs and people; firm but loving training; ample exercise; and lots of quality time with his adored humans. If these requirements are met, there is no more loyal, lovable, and entertaining companion. This is the ultimate “personality breed.”
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md text-sm font-semibold transition">Breed Standard</a>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php
    include "src/components/footer.php";
?>