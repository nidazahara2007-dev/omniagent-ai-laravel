# OmniAgent AI - Enterprise Multi-Agent Workspace Console 🤖

An advanced, production-ready Full Stack Laravel application integrated with the Gemini API. This platform features dynamic background prompt injection layers, decoupled service architecture, and real-time frontend markdown rendering engines.

---

## 🚀 Key Architectural Features

* **Decoupled Service Layer:** Core AI logic encapsulated within a dedicated `GeminiService` provider rather than polluting controllers.
* **Dynamic Prompt Injection:** Allows live-switching of AI behavior personas (SaaS Architect, SQL Optimizer, General Utility) directly from the UI without touching the codebase.
* **Fault-Tolerant Fallback Pipeline:** Built-in structural mock engine to maintain 100% platform uptime and integrity if API thresholds or network handshakes fail.
* **Premium SaaS Tech Dashboard:** Integrated with `Marked.js` and `Highlight.js` for real-time markdown parsing and database syntax-colored dark terminal rendering boxes.

## 🛠️ Project Directory Mapping (Core Files)
* `app/Services/GeminiService.php` - Core API Client & Prompt Injection Gateways.
* `app/Http/Controllers/ChatController.php` - Secure request routing, state payloads, and response distribution.
* `routes/web.php` - Clean, decoupled web application entry endpoints.
* `resources/views/chat.blade.php` - Full Blade dashboard with real-time text parsing engines.
