<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity=TypeProject::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeOfProject;

    /**
     * @ORM\ManyToMany(targetEntity=Language::class, inversedBy="projects")
     */
    private $language;

    /**
     * @ORM\ManyToMany(targetEntity=Librairie::class, inversedBy="projects")
     */
    private $librairies;

    /**
     * @ORM\ManyToMany(targetEntity=Framework::class, inversedBy="projects")
     */
    private $frameworks;

    /**
     * @ORM\ManyToMany(targetEntity=DesignPattern::class, inversedBy="projects")
     */
    private $designPattern;

    /**
     * @ORM\ManyToMany(targetEntity=Software::class, inversedBy="projects")
     */
    private $softwares;

    /**
     * @ORM\ManyToMany(targetEntity=Method::class, inversedBy="projects")
     */
    private $method;

    /**
     * @ORM\ManyToMany(targetEntity=ContentManagementSystem::class, inversedBy="projects")
     */
    private $contentManagementSystems;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="projects")
     */
    private $customers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $webLink;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="projects")
     */
    private $pictures;

    public function __construct()
    {
        $this->language = new ArrayCollection();
        $this->librairies = new ArrayCollection();
        $this->frameworks = new ArrayCollection();
        $this->designPattern = new ArrayCollection();
        $this->softwares = new ArrayCollection();
        $this->method = new ArrayCollection();
        $this->contentManagementSystems = new ArrayCollection();
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTypeOfProject(): ?TypeProject
    {
        return $this->typeOfProject;
    }

    public function setTypeOfProject(TypeProject $typeOfProject): self
    {
        $this->typeOfProject = $typeOfProject;

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguage(): Collection
    {
        return $this->language;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->language->contains($language)) {
            $this->language[] = $language;
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        $this->language->removeElement($language);

        return $this;
    }

    /**
     * @return Collection|Librairie[]
     */
    public function getLibrairies(): Collection
    {
        return $this->librairies;
    }

    public function addLibrairy(Librairie $librairy): self
    {
        if (!$this->librairies->contains($librairy)) {
            $this->librairies[] = $librairy;
        }

        return $this;
    }

    public function removeLibrairy(Librairie $librairy): self
    {
        $this->librairies->removeElement($librairy);

        return $this;
    }

    /**
     * @return Collection|Framework[]
     */
    public function getFrameworks(): Collection
    {
        return $this->frameworks;
    }

    public function addFramework(Framework $framework): self
    {
        if (!$this->frameworks->contains($framework)) {
            $this->frameworks[] = $framework;
        }

        return $this;
    }

    public function removeFramework(Framework $framework): self
    {
        $this->frameworks->removeElement($framework);

        return $this;
    }

    /**
     * @return Collection|DesignPattern[]
     */
    public function getDesignPattern(): Collection
    {
        return $this->designPattern;
    }

    public function addDesignPattern(DesignPattern $designPattern): self
    {
        if (!$this->designPattern->contains($designPattern)) {
            $this->designPattern[] = $designPattern;
        }

        return $this;
    }

    public function removeDesignPattern(DesignPattern $designPattern): self
    {
        $this->designPattern->removeElement($designPattern);

        return $this;
    }

    /**
     * @return Collection|Software[]
     */
    public function getSoftwares(): Collection
    {
        return $this->softwares;
    }

    public function addSoftware(Software $software): self
    {
        if (!$this->softwares->contains($software)) {
            $this->softwares[] = $software;
        }

        return $this;
    }

    public function removeSoftware(Software $software): self
    {
        $this->softwares->removeElement($software);

        return $this;
    }

    /**
     * @return Collection|Method[]
     */
    public function getMethod(): Collection
    {
        return $this->method;
    }

    public function addMethod(Method $method): self
    {
        if (!$this->method->contains($method)) {
            $this->method[] = $method;
        }

        return $this;
    }

    public function removeMethod(Method $method): self
    {
        $this->method->removeElement($method);

        return $this;
    }

    /**
     * @return Collection|ContentManagementSystem[]
     */
    public function getContentManagementSystems(): Collection
    {
        return $this->contentManagementSystems;
    }

    public function addContentManagementSystem(ContentManagementSystem $contentManagementSystem): self
    {
        if (!$this->contentManagementSystems->contains($contentManagementSystem)) {
            $this->contentManagementSystems[] = $contentManagementSystem;
        }

        return $this;
    }

    public function removeContentManagementSystem(ContentManagementSystem $contentManagementSystem): self
    {
        $this->contentManagementSystems->removeElement($contentManagementSystem);

        return $this;
    }

    public function getCustomers(): ?Customer
    {
        return $this->customers;
    }

    public function setCustomers(?Customer $customers): self
    {
        $this->customers = $customers;

        return $this;
    }

    public function getWebLink(): ?string
    {
        return $this->webLink;
    }

    public function setWebLink(?string $webLink): self
    {
        $this->webLink = $webLink;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setProjects($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getProjects() === $this) {
                $picture->setProjects(null);
            }
        }

        return $this;
    }
}
