
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OmniAgent AI - Enterprise Control Panel</title>
    <!-- Bootstrap CSS Matrix -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- HighlightJS Custom CDN for Beautiful Dark Terminal Code Boxes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/github-dark.min.css">
    
    <style>
        body { background-color: #0f172a !important; font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; color: #e2e8f0; }
        .main-wrapper { max-width: 1200px; margin: 30px auto; padding: 0 15px; }
        .stat-card { background: #1e293b; border: 1px solid #334155; border-radius: 12px; transition: all 0.3s ease; }
        .stat-card:hover { border-color: #6366f1; transform: translateY(-2px); }
        .chat-container { background: #1e293b; border: 1px solid #334155; border-radius: 16px; overflow: hidden; height: 580px; display: flex; flex-direction: column; }
        .settings-container { background: #1e293b; border: 1px solid #334155; border-radius: 16px; padding: 20px; height: 580px; display: flex; flex-direction: column; justify-content: space-between; }
        .chat-header { background: #1e1b4b; border-bottom: 1px solid #312e81; color: white; padding: 15px 20px; font-weight: 600; }
        .chat-box { flex-grow: 1; overflow-y: auto; padding: 25px; background: #0f172a; }
        .message-row { margin-bottom: 20px; display: flex; flex-direction: column; }
        .msg-user { align-self: flex-end; background: #4f46e5; color: white; border-radius: 16px 16px 0 16px; padding: 12px 18px; max-width: 80%; box-shadow: 0 4px 10px rgba(79, 70, 229, 0.2); font-size: 0.95rem; }
        .msg-ai { align-self: flex-start; background: #1e293b; color: #f1f5f9; border-radius: 16px 16px 16px 0; padding: 15px 20px; max-width: 85%; border: 1px solid #334155; box-shadow: 0 4px 10px rgba(0,0,0,0.1); font-size: 0.95rem; line-height: 1.6; }
        .label-text { font-size: 0.75rem; color: #64748b; margin-bottom: 4px; font-weight: 600; text-uppercase: true; }
        .user-label { text-align: right; color: #818cf8; }
        .mode-badge { font-size: 0.7rem; background: #1e1b4b; color: #c7d2fe; padding: 3px 8px; border-radius: 6px; display: inline-block; margin-top: 8px; border: 1px solid #312e81; }
        .form-control, .form-select { background-color: #0f172a !important; border: 1px solid #334155 !important; color: #f1f5f9 !important; }
        .form-control:focus, .form-select:focus { border-color: #6366f1 !important; box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2) !important; }
        pre { margin-top: 12px; margin-bottom: 12px; border-radius: 8px; overflow: hidden; background: #011627; padding: 10px; }
        code { font-family: 'Fira Code', Consolas, Monaco, monospace !important; font-size: 0.88rem !important; }
    </style>
</head>
<body>

<div class="container main-wrapper">
    
    <!-- HIGH-TIER ANALYTICS PIECE -->
    <div class="row mb-4 g-3">
        <div class="col-md-4">
            <div class="stat-card p-3 d-flex flex-column">
                <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.05em;">Total Transaction Hits</span>
                <span class="h2 fw-bold mt-1 text-white">{{ $totalRequests ?? 0 }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card p-3 d-flex flex-column">
                <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.05em;">Inventory Optimizations</span>
                <span class="h2 fw-bold mt-1 text-emerald-400">{{ $sqlOptimizations ?? 0 }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card p-3 d-flex flex-column">
                <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.05em;">SaaS Venture Blueprints</span>
                <span class="h2 fw-bold mt-1 text-warning">{{ $businessModels ?? 0 }}</span>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Chat Area Block -->
        <div class="col-lg-8">
            <div class="chat-container">
                <div class="chat-header d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center gap-2">🤖 OmniAgent Enterprise Workspace Console</span>
                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-2 py-1" style="font-size: 0.72rem;">Pipeline Status: Secure</span>
                </div>

                <div class="chat-box" id="chatBox">
                    @if($messages->isEmpty())
                        <div class="text-center text-muted mt-5">
                            <h5 class="text-white-50">Enterprise Engine Initialized</h5>
                            <p class="small">Configure system settings on the control rig grid panel to begin stream execution.</p>
                        </div>
                    @else
                        @foreach($messages as $msg)
                            <div class="message-row">
                                <span class="label-text user-label">Inbound Stream Request</span>
                                <div class="msg-user">{{ $msg->user_message }}</div>
                            </div>

                            <div class="message-row">
                                <span class="label-text">Outbound System Matrix Response</span>
                                <div class="msg-ai">
                                    <!-- Markdown placeholder space -->
                                    <div class="markdown-content">{!! e($msg->ai_response) !!}</div>
                                    @if($msg->system_instruction)
                                        <div class="mode-badge">Instruction Mapping Stack: {{ Str::limit($msg->system_instruction, 45) }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="p-3 border-top border-secondary border-opacity-10" style="background: #1e293b;">
                    <form action="{{ route('chat.send') }}" method="POST" id="chatForm">
                        @csrf
                        <input type="hidden" name="system_instruction" id="hiddenInstruction">
                        <div class="input-group">
                            <input type="text" name="message" class="form-control" placeholder="Execute pipeline target instructions or queries..." required autocomplete="off">
                            <button type="submit" class="btn px-4 text-white fw-bold" style="background: #4f46e5; border: none;">Push Stream</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Configurations Panel -->
        <div class="col-lg-4">
            <div class="settings-container">
                <div>
                    <h5 class="fw-bold text-white mb-2">⚙️ Execution System Panel</h5>
                    <p class="text-muted small mb-4">Manipulate runtime parameters and neural contextual directives below:</p>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-white-50">Target Configuration Vector</label>
                        <select class="form-select" id="modePreset" onchange="updateInstruction()">
                            <option value="software_house">🚀 Multi-Agent SaaS Architect Mode</option>
                            <option value="inventory_manager">📦 Automated Inventory Data Optimizer (SQL)</option>
                            <option value="generic">🤖 Core General Base Framework Utility</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-white-50">Active Prompt Stack Injections</label>
                        <textarea class="form-control small text-muted" id="instructionText" rows="7" style="font-size: 0.82rem; background: #0f172a; border-color: #334155; color: #94a3b8 !important;" readonly></textarea>
                    </div>
                </div>
                
                <div class="alert bg-dark text-muted border-secondary border-opacity-20 py-2 px-3 mb-0" style="font-size: 0.72rem; color: #94a3b8 !important;">
                    <strong>Pipeline Protocol Matrix:</strong> Runtime data mappings are systematically indexed into localized database engines under structural validation sequences.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Dynamic Parsing Script Libraries Injection Matrix -->
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>

<script>
    const presets = {
        software_house: "You are OmniAgent, a brilliant AI Assistant helping Nida Fatima build a virtual software house and automate her systems in Pakistan. Keep responses professional, highly precise, and technical.",
        inventory_manager: "You are an automated Inventory Database Expert. Your single job is to analyze stock requirements and write optimized automated SQL or query responses for stock layers.",
        generic: "You are OmniAgent, a flexible general-purpose software utility assistant."
    };

    function updateInstruction() {
        const selectedMode = document.getElementById('modePreset').value;
        const instruction = presets[selectedMode];
        document.getElementById('instructionText').value = instruction;
        document.getElementById('hiddenInstruction').value = instruction;
    }

    document.getElementById('chatForm').addEventListener('submit', function() {
        updateInstruction();
    });

    // MARKDOWN & TERMINAL PARSER INJECTION LOGIC
    document.addEventListener("DOMContentLoaded", function() {
        updateInstruction();
        
        // Convert all template response fields dynamically into rich structural elements
        document.querySelectorAll('.markdown-content').forEach(function(el) {
            const rawText = el.textContent || el.innerText;
            // Parse Markdown syntax seamlessly
            el.innerHTML = marked.parse(rawText.trim());
        });

        // Trigger code formatting highlight filters
        hljs.highlightAll();

        // Push chat panel view port grid to absolute bottom position 
        var chatBox = document.getElementById("chatBox");
        chatBox.scrollTop = chatBox.scrollHeight;
    });
</script>

</body>
</html>