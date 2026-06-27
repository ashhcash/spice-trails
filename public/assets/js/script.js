const posts = [
  {
    title: "The old biryani counter where potatoes still matter",
    category: "Food",
    date: "June 12, 2026",
    location: "Kolkata",
    image: "https://images.unsplash.com/photo-1563379091339-03246963d51a?auto=format&fit=crop&w=900&q=80",
    excerpt: "A slow lunch at a narrow shop that treats rice, meat, aloo, and attar like a quiet family agreement."
  },
  {
    title: "Mahaprasad, temple smoke, and the patience of queues",
    category: "Travel",
    date: "May 28, 2026",
    location: "Tarapith",
    image: "https://images.unsplash.com/photo-1596040033229-a9821ebd058d?auto=format&fit=crop&w=900&q=80",
    excerpt: "Not every sacred meal is delicate. Some arrive with heat, clang, devotion, and a plate that asks you to slow down."
  },
  {
    title: "A mango chutney recipe from a grandmother's steel dabba",
    category: "Recipe",
    date: "April 19, 2026",
    location: "Home kitchen",
    image: "https://images.unsplash.com/photo-1601050690597-df0568f70950?auto=format&fit=crop&w=900&q=80",
    excerpt: "Sweet, sharp, sticky, and built for the last spoon of dal rice. This one keeps well, though it rarely lasts."
  },
  {
    title: "Breakfast in a lane that smells of tea and frying dough",
    category: "Food",
    date: "March 31, 2026",
    location: "North Kolkata",
    image: "https://images.unsplash.com/photo-1517244683847-7456b63c5969?auto=format&fit=crop&w=900&q=80",
    excerpt: "Kochuri, jilipi, earthen cups of tea, and the kind of counter banter that turns strangers into regulars."
  },
  {
    title: "Fish curry on the coast after a rain-washed market walk",
    category: "Travel",
    date: "February 22, 2026",
    location: "Goa",
    image: "https://images.unsplash.com/photo-1606851091851-e8c8c0fca5ba?auto=format&fit=crop&w=900&q=80",
    excerpt: "A coastal plate that tastes of kokum, coconut, wet roads, and the bargaining rhythm of a morning fish market."
  }
];

const postList = document.querySelector("#postList");
const searchInput = document.querySelector("#searchInput");
const filterButtons = document.querySelectorAll("[data-filter]");
const quickSearchButtons = document.querySelectorAll("[data-search]");
const form = document.querySelector("#newsletterForm");
const emailInput = document.querySelector("#emailInput");
const formMessage = document.querySelector("#formMessage");

let activeFilter = "all";

function renderPosts() {
  if (!postList || !searchInput) {
    return;
  }

  const term = searchInput.value.trim().toLowerCase();
  const visiblePosts = posts.filter((post) => {
    const matchesFilter = activeFilter === "all" || post.category === activeFilter;
    const searchable = `${post.title} ${post.category} ${post.location} ${post.excerpt}`.toLowerCase();
    return matchesFilter && searchable.includes(term);
  });

  postList.innerHTML = visiblePosts.length
    ? visiblePosts.map((post) => `
      <article class="post-card">
        <img src="${post.image}" alt="${post.title}">
        <div class="post-body">
          <div class="post-meta">
            <span>${post.category}</span>
            <span>${post.date}</span>
            <span>${post.location}</span>
          </div>
          <h3>${post.title}</h3>
          <p>${post.excerpt}</p>
          <a class="read-link" href="#newsletter">Read story</a>
        </div>
      </article>
    `).join("")
    : `<p class="empty-state">No stories match that search yet. Try biryani, street, sweet, or travel.</p>`;
}

if (postList && searchInput) {
  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      activeFilter = button.dataset.filter;
      document.querySelectorAll(".filter").forEach((item) => {
        item.classList.toggle("active", item.dataset.filter === activeFilter);
      });
      renderPosts();
      document.querySelector("#stories").scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  quickSearchButtons.forEach((button) => {
    button.addEventListener("click", () => {
      searchInput.value = button.dataset.search;
      activeFilter = "all";
      document.querySelectorAll(".filter").forEach((item) => {
        item.classList.toggle("active", item.dataset.filter === "all");
      });
      renderPosts();
      document.querySelector("#stories").scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  searchInput.addEventListener("input", renderPosts);
}

if (form && emailInput && formMessage) {
  form.addEventListener("submit", (event) => {
    event.preventDefault();
    formMessage.textContent = `Thanks, ${emailInput.value}. Your next food note is on the way.`;
    form.reset();
  });
}

renderPosts();
