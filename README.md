# Flibber: AI Research Companion
Flibber is an AI-powered research platform designed to streamline and enhance the research process. By leveraging advanced AI, Flibber provides personalized insights, real-time feedback, and collaboration tools, empowering researchers to optimize their projects, manage workflows, and make informed decisions more efficiently.

## Table of Contents
- [About the Project](#about-the-project)
- [Features](#features)
- [Project Architecture](#project-architecture)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## About the Project
Flibber was developed to address common challenges in research, including time-consuming data management, collaboration barriers, and version control issues. With a focus on building a collaborative research community, Flibber facilitates efficient teamwork, open communication, and continuous improvement among researchers across disciplines.

## Features
- **AI-Powered Insights**: Get personalized feedback, recommendations, and strategies based on your research area.
- **Research Paper Summarization**: Generate concise summaries for research papers to extract essential information quickly.
- **Citation Management**: Streamline your references, making it easier to cite works accurately and efficiently.
- **Version Control**: Track changes in research projects with full version history.
- **Real-Time Collaboration**: Collaborate seamlessly with researchers across the globe.
- **Vultr Cloud Infrastructure**: Scalable data processing and storage powered by Vultr to handle high-performance computing needs.

## Project Architecture
Flibber is designed with a microservice architecture to ensure scalability and flexibility. Below is a high-level overview of its system architecture:

- **Frontend**: Built using Laravel Livewire with Ant Design (Antd) for a user-friendly interface.
- **Backend**: RESTful API developed in PHP and Laravel, with AI functionalities powered by serverless inference on Vultr.
- **Database**: Hosted on Vultr Block Storage for reliable, scalable storage.
- **Cloud Infrastructure**: Deployed on Vultr cloud instance with serverless components for on-demand AI processing.

## Getting Started
### Prerequisites
Before setting up Flibber locally, ensure you have the following installed:
- [PHP >= 8.0](https://www.php.net/downloads)
- [Laravel >= 9.0](https://laravel.com/docs/9.x/installation)
- [Node.js and npm](https://nodejs.org/) for frontend dependencies
- [Composer](https://getcomposer.org/) for PHP package management
- Vultr API Key (for accessing serverless inference)

### Installation
1. **Clone the Repository**:
    ```bash
    git clone https://github.com/yourusername/flibber.git
    cd flibber
    ```

2. **Install PHP and JavaScript Dependencies**:
    ```bash
    composer install
    npm install && npm run build
    ```

3. **Environment Configuration**:
    Copy the `.env.example` to create a `.env` file and update it with your credentials, including the Vultr API key.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database Setup**:
    Set up your database and update the `.env` file with database credentials. Then run migrations:
    ```bash
    php artisan migrate
    ```

5. **Start the Application**:
    ```bash
    php artisan serve
    ```

## Usage
Once set up, navigate to `http://localhost:8000` to begin using Flibber. 

1. **Home Dashboard**: Explore the dashboard for an overview of available tools and features.
2. **Upload Papers**: Use the `Upload` section to add research papers, which can then be summarized or annotated.
3. **Real-Time Collaboration**: Access the collaborative workspace to share insights and feedback with others.
4. **Citation Management**: Add and organize citations using the citation manager tool.
5. **Manage Versions**: Keep track of your research projects and retrieve previous versions as needed.

## Contributing
We welcome contributions to enhance Flibber! If you’d like to add features or fix issues, please:
1. Fork the repository.
2. Create a branch for your feature (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature/new-feature`).
5. Create a pull request.

## License
This project is licensed under the MIT License.

## Contact
For questions or suggestions, please contact the team at [pratham.vishwakarma125940@gmail.com](mailto:pratham.vishwakarma125940@gmail.com).

---

Thank you for exploring Flibber! We hope this tool significantly enhances your research experience and fosters innovation in your field.
