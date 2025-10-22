# CyberUI - Modern Cybersecurity Website Template

A modern, professional, and visually stunning website template designed specifically for cybersecurity organizations. Built with Laravel and featuring a clean, responsive design with smooth animations and an intuitive user interface.

## Features

### Navigation
- **4 Main Menu Items**: Accueil, Publications (with dropdown), Documentation, Contact
- **Dropdown Menu**: Publications submenu includes Alertes, Rapports, and Bulletins
- **CTA Button**: "Déclarer un incident" button prominently displayed in the navigation
- **Responsive Mobile Menu**: Hamburger menu for mobile devices

### Home Page
- **Hero Carousel**: Eye-catching carousel with cybersecurity-themed content and smooth transitions
- **Recent Articles Section**: Horizontal scrolling showcase of the latest articles (displays 3 at a time)
- **Latest Alerts Section**: Horizontal scrolling cards showing the 5 most recent alerts with:
  - Title
  - Gravity level (color-coded: Critical, High, Medium)
  - Progress/completion status with progress bars
  - Status indicators
- **Quick Actions Grid**: Fast access to key sections

### Publications Pages

#### Alertes
- List view with filterable cards
- Search functionality
- Filter by gravity level (Critical, High, Medium)
- Pagination
- Color-coded severity indicators
- Progress tracking for each alert

#### Rapports
- Comprehensive report listing
- Search and filter by category (Annual, Quarterly, Monthly, Thematic)
- Pagination
- Download functionality

#### Bulletins
- Weekly security bulletin listing
- Search functionality
- Pagination
- PDF download option

### Documentation Page
Organized content display including:
- **Videos**: Tutorial and training videos with thumbnails and duration
- **Articles**: Educational articles and guides
- **Legal Texts**: Laws, regulations, and compliance documents
- **PDF Documents**: Downloadable resources with file size and page count

### Contact Page
- Email address
- Phone number
- Website link
- Physical address
- Business hours
- Quick action cards for incident reporting and alerts

### Incident Declaration Page
Multi-step wizard-style form with:
1. **Organization Information**
2. **Contact Details**
3. **Incident Details**:
   - Incident type (Malware, Phishing, Ransomware, Data Breach, etc.)
   - Date and time
   - Severity level
   - Detailed description
   - Affected systems
   - Actions already taken

## Design Features

### Visual Style
- **Modern Dark Theme**: Blue/black color palette
- **Cybersecurity-Oriented**: Professional and trust-inspiring design
- **Neumorphic Elements**: Soft shadows and depth
- **Smooth Animations**: Fade-ins, slide-ups, and hover effects
- **Color-Coded Status**: Intuitive visual indicators for alert severity

### Color Palette
- Primary Blue: `#0066ff`
- Secondary Dark: `#1a1a2e`
- Accent Cyan: `#00d4ff`
- Danger Red: `#ff3860`
- Warning Orange: `#ffb347`
- Success Green: `#00d1b2`

### Typography
- Clean, modern font stack
- Clear hierarchy
- Excellent readability

### Responsive Design
- Fully responsive for all device sizes
- Mobile-first approach
- Adaptive layouts
- Touch-friendly interface

## Technology Stack

- **Backend**: Laravel 10
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Icons**: Font Awesome 6
- **Architecture**: MVC Pattern

## File Structure

```
CyberUI/
├── app/
│   └── Http/
│       └── Controllers/
│           ├── HomeController.php
│           ├── AlerteController.php
│           ├── RapportController.php
│           ├── BulletinController.php
│           ├── DocumentationController.php
│           ├── ContactController.php
│           └── IncidentController.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       └── pages/
│           ├── home.blade.php
│           ├── alertes.blade.php
│           ├── rapports.blade.php
│           ├── bulletins.blade.php
│           ├── documentation.blade.php
│           ├── contact.blade.php
│           └── incident-form.blade.php
├── public/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── main.js
├── routes/
│   └── web.php
└── README.md
```

## Installation

1. Clone the repository
2. Install dependencies (if using Composer):
   ```bash
   composer install
   ```
3. Copy `.env.example` to `.env` and configure your environment
4. Serve the application:
   ```bash
   php artisan serve
   ```
5. Visit `http://localhost:8000` in your browser

## Routes

- `/` - Home page
- `/alertes` - Alerts listing
- `/rapports` - Reports listing
- `/bulletins` - Bulletins listing
- `/documentation` - Documentation resources
- `/contact` - Contact information
- `/declarer-incident` - Incident declaration form

## Features in Detail

### Interactive Elements

1. **Carousel**
   - Auto-play with 5-second intervals
   - Manual navigation with arrow buttons
   - Click-to-navigate indicators
   - Keyboard navigation support (arrow keys)
   - Pause on hover

2. **Horizontal Scrolling**
   - Smooth scroll behavior
   - Navigation buttons
   - Touch/swipe support on mobile
   - Adaptive button visibility

3. **Form Validation**
   - Real-time validation
   - Clear error messages
   - Visual feedback
   - Required field indicators

4. **Search & Filter**
   - Live search functionality
   - Multiple filter options
   - Clear search button
   - Instant results

5. **Animations**
   - Fade-in on scroll
   - Progress bar animations
   - Hover effects
   - Smooth transitions

### Responsive Breakpoints

- Desktop: 1024px and above
- Tablet: 768px - 1023px
- Mobile: Below 768px

## Customization

### Colors
Edit CSS variables in `public/css/style.css`:

```css
:root {
    --primary-color: #0066ff;
    --secondary-color: #1a1a2e;
    --accent-color: #00d4ff;
    /* ... */
}
```

### Content
Update controller files to modify sample data or connect to a database.

### Styling
All styles are in `public/css/style.css` - organized by component for easy customization.

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Future Enhancements

- Database integration for dynamic content
- User authentication system
- Admin dashboard for content management
- Email notifications for incident reports
- Multi-language support
- Advanced search with filters
- RSS feed integration
- Newsletter subscription

## Credits

Designed and developed as a modern cybersecurity website template.

## License

MIT License - Feel free to use for your projects.

---

**Note**: This is a template with sample data. For production use, integrate with a database and implement proper security measures.
