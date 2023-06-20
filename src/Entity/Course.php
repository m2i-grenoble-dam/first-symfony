<?php

namespace App\Entity;
use DateTime;

class Course {
    public function __construct(
    private string $title= '',
    private string $content = '',
    private ?DateTime $published = null,
    private ?string $subject = '',
    private ?int $id = null) {}

	/**
	 * @return int
	 */
	public function getId(): ?int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}
	
	/**
	 * @param string $title 
	 * @return self
	 */
	public function setTitle(string $title): self {
		$this->title = $title;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getContent(): string {
		return $this->content;
	}
	
	/**
	 * @param string $content 
	 * @return self
	 */
	public function setContent(string $content): self {
		$this->content = $content;
		return $this;
	}
	
	/**
	 * @return DateTime
	 */
	public function getPublished(): ?DateTime {
		return $this->published;
	}
	
	/**
	 * @param DateTime $published 
	 * @return self
	 */
	public function setPublished(?DateTime $published): self {
		$this->published = $published;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getSubject(): string {
		return $this->subject;
	}
	
	/**
	 * @param string $subject 
	 * @return self
	 */
	public function setSubject(string $subject): self {
		$this->subject = $subject;
		return $this;
	}
}