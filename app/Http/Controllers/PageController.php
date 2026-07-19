<?php

namespace App\Http\Controllers;

/**
 * Renders the static marketing pages for the Dimgent Technologies website.
 * Each page pulls its content from the drafts/content/* text files so the
 * copy stays in a single, editable place.
 */
class PageController extends Controller
{
    /**
     * Shared page metadata passed to every view.
     */
    private function withMeta(string $title, string $description): array
    {
        return [
            'pageTitle' => $title,
            'metaDescription' => $description,
        ];
    }

    public function home()
    {
        return view('pages.home', $this->withMeta(
            'Dimgent Technologies — Electronics Development',
            'Custom electronic device development — from concept to finished product. Circuits, software, PCB design and prototyping by a team with 20+ years of experience.',
        ));
    }

    public function products()
    {
        return view('pages.products', $this->withMeta(
            'Products — Dimgent Technologies',
            'Garand 101 — a high-resolution fluxgate magnetometer-gradiometer for archaeology, geology, environmental monitoring and more.',
        ));
    }

    public function services()
    {
        return view('pages.services', $this->withMeta(
            'Services — Dimgent Technologies',
            'Full-cycle electronic device development or individual phases: specifications, circuit design, software, PCB layout, prototyping and certification.',
        ));
    }

    public function projects()
    {
        return view('pages.projects', $this->withMeta(
            'Projects — Dimgent Technologies',
            'Selected development projects: control systems, testing tools, everyday technology and medical devices.',
        ));
    }

    public function about()
    {
        return view('pages.about', $this->withMeta(
            'About — Dimgent Technologies',
            'Dimgent Technologies is a group of engineers, designers and programmers in Minsk, Belarus, with more than 20 years of experience and 50+ completed projects.',
        ));
    }

    public function contacts()
    {
        return view('pages.contacts', $this->withMeta(
            'Contacts — Dimgent Technologies',
            'Get in touch with Dimgent Technologies. Email us or use the contact form to discuss your electronic device development project.',
        ));
    }
}
